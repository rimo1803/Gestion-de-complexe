<?php

namespace App\Http\Controllers;
use App\Models\personnel;

use App\Models\Attestation;
use Illuminate\Http\Request;
use App\Models\AttestationSalaire;
use App\Models\AttestationTravail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NouvelleDemandeAttestation;

class AttestationController extends Controller
{
    //
    public function index()
{
    $user = auth()->user();
    $attestations = $user->attestations()->latest()->get();
    return view('Accueil_personnel.attestations', compact('attestations'));
}
public function download(Attestation $attestation)
{
    // Logic to retrieve the file path of the attestation
    $filePath = $attestation->file_path;

    // Download the file
    return response()->download(Storage::path($filePath));
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
    $directeur = personnel::where('role', 'directeur')->first();
    if ($directeur) {
        $directeur->notify(new NouvelleDemandeAttestation($attestation));
    }
    return redirect()->route('attestations.index')->with('success', 'Votre demande a été soumise avec succès.');
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

}
