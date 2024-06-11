<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Dompdf\Dompdf;

use Dompdf\Options;
use App\Models\personnel;
use App\Models\Attestation;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\AttestationSalaire;
use App\Models\AttestationTravail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NouvelleDemandeAttestation;
use App\Notifications\AttestationRefuseNotification;

class AttestationController extends Controller
{
    //affichage des attestation de personnel authentifie

    public function index(){
        $personnel = Auth::user();
        $attestations = Attestation::where('personnel_id', $personnel->id)->get();
        return view('Accueil_personnel.attestations', compact('attestations'));

    }

public function download($id)
{

    $attestation = Attestation::findOrFail($id);
    // Download the file
    $filePath = $attestation->document;
    return response()->download(Storage::path($filePath));
}

public function generatePDFtravail($id)
{
    $attestation = Attestation::findOrFail($id);
    $attestation->date_edition = Carbon::now();
     $attestation->status = 'disponible';
    $attestation->save();
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);
    $html = View::make('Accueil_directeur.Travailattestationpdf', compact('attestation'))->render();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $pdf_content = $dompdf->output();
    $attestation->document = $pdf_content;
    $fileName = 'attestation_' . Str::uuid() . '.pdf';
    $filePath = storage_path('app/public/attestations/' . $fileName);
    Storage::disk('public')->put('attestations/' . $fileName, $pdf_content);
    $attestation = Attestation::findOrFail($id);
    $attestation->document = 'attestations/' . $fileName; // Chemin relatif du fichier
    $attestation->save();
    return response()->streamDownload(function() use ($pdf_content) {
        echo $pdf_content;
    }, 'attestation.pdf');
}

public function generatePDFsalaire($id){
    $attestation = Attestation::findOrFail($id);
    $attestation->date_edition = Carbon::now();
    $attestation->status = 'disponible';
    $attestation->save();
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);
    $html = View::make('Accueil_directeur.Salaireattestationpdf', compact('attestation'))->render();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $pdf_content = $dompdf->output();
    $attestation->document = $pdf_content;
    $fileName = 'attestation_' . Str::uuid() . '.pdf';
    $filePath = storage_path('app/public/attestations/' . $fileName);
    Storage::disk('public')->put('attestations/' . $fileName, $pdf_content);

    // Enregistrer le chemin du fichier dans la base de données
    $attestation = Attestation::findOrFail($id);
    $attestation->document = 'attestations/' . $fileName; // Chemin relatif du fichier
    $attestation->save();
    return response()->streamDownload(function() use ($pdf_content) {
        echo $pdf_content;
    }, 'attestation.pdf');

}

public function create()
{
    return view('Accueil_personnel.demandeattestation');
}
public function store(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'description' => 'required|string',
        'type' => 'required|string|in:travail,salaire',
    ]);
    // Création de l'attestation principale
    $attestation = Attestation::create([
        'description' => $request->input('description'),
        'type_attestation' => $request->input('type'),
        'date_edition' => now(),
        'reference' => $this->generateReference($request->input('type')),
        'personnel_id' => Auth::id(),
        'document' => 'en_attente',
        'status'=>'en_attente',
    ]);


    // Création de l'attestation en fonction du type
    if ($request->input('type') === 'travail') {
        $attestationTravail = AttestationTravail::create([
            'attestation_id' => $attestation->id,
            'position' => $request->input('position'),
            'department' => $request->input('department'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'document' => 'en_attente',

        ]);
    } elseif ($request->input('type') === 'salaire') {
        $attestationSalaire = AttestationSalaire::create([
            'attestation_id' => $attestation->id,
            'salary' => $request->input('salary'),
            'currency' => $request->input('currency'),
            'salary_date' => $request->input('salary_date'),
            'document' => 'en_attente',
        ]);
    }
    // Envoyer la notification à tous les directeurs
    $directeurs = personnel::where('role', 'directeur')->get();
    foreach ($directeurs as $directeur) {
        $directeur->notify(new NouvelleDemandeAttestation($attestation));
    }

    return redirect()->route('mesattestation')->with('success', 'Votre demande a été soumise avec succès.');
}
private function generateReference($type)
{
    // Déterminer le préfixe en fonction du type d'attestation
    $prefix = ($type === 'travail') ? 'TRV' : 'SAL';
    // Obtenir le dernier numéro incrémenté pour l'année actuelle
    $latestAttestation = Attestation::whereYear('created_at', now()->year)->orderBy('id', 'desc')->first();
    $referenceNumber = ($latestAttestation) ? intval(substr($latestAttestation->reference, -4)) + 1 : 1;
    $referenceNumber = str_pad($referenceNumber, 4, '0', STR_PAD_LEFT);

    // Générer le numéro de référence
    return $prefix . '/DRTTA/TETOUAN/' . $referenceNumber . '/' . now()->year;
}

    public function affichage()
    {
        $attestations = Attestation::with(['personnel', 'travail', 'salaire'])->paginate(7);
        return view('Accueil_directeur.attestations', compact('attestations'));
    }

    public function attestationTravail($id)
    {
        $attestation = Attestation::findOrFail($id);
        $attes=AttestationTravail::where('attestation_id',$id);
        return view('Accueil_directeur.attestationTravail', compact('attestation','attes'));
    }
    public function attestationSalaire($id)
    {
        $attestation = Attestation::findOrFail($id);
        $attes=AttestationSalaire::where('attestation_id',$id);
        return view('Accueil_directeur.attestationSalaire', compact('attestation','attes'));
    }
    public function refuseAttestation($id)
    {
        $attestation = Attestation::findOrFail($id);
        $attestation->status = 'refuse';
        $attestation->save();
        $attestation->personnel->notify(new AttestationRefuseNotification($attestation));

        return redirect()->route('attestations.index')->with('success', 'L\'attestation a été refusée avec succès.');
    }
}
