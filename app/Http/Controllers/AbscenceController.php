<?php

namespace App\Http\Controllers;

use Log;
use App\Models\abscence;
use App\Models\personnel;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NouvelleJustificationDeposee;
use App\Notifications\JustificationRefuseeNotification;
use App\Notifications\JustificationAccepteeNotification;


class AbscenceController extends Controller
{
    public function showabs(){
        $abscences = Abscence::with('personnel')->paginate(7);
        return view('Accueil_directeur.abscence',compact('abscences'));
    }
    public function showpersonnelabsence()
    {
        $personnel = Auth::user();
        $absences = Abscence::where('immat_per', $personnel->imat)->get();
        return view('Accueil_personnel.abscence', compact('absences'));
    }
    public function showJustifyForm($id)
{
    $abscence = Abscence::findOrFail($id);
    return view('justify_form', compact('abscence'));
}

public function justify(Request $request, $id)
{
    $abscence = Abscence::findOrFail($id);

    // Enregistrez votre justification dans la base de données
    $abscence->justification = $request->file('justification')->store('justifications');
    $abscence->type_abscence = 'en_attente';
    $abscence->save();

     // Préparez les données d'absence nécessaires pour la notification
     $abscenceData = [
         'id' => $abscence->id,
         'personnel' => $abscence->personnel->Nomper . ' ' . $abscence->personnel->prenomper,
         // Ajoutez d'autres informations d'absence si nécessaire
     ];

     // Envoyer la notification à tous les directeurs
     $directeurs = personnel::where('role', 'directeur')->get();
     foreach ($directeurs as $directeur) {
         $directeur->notify(new NouvelleJustificationDeposee($abscenceData));
     }

    return redirect()->route('mesabsc')->with('success', 'Abscence justifiée avec succès.');
}
    public function downloadJustification($id)
    {
        $abscence = Abscence::findOrFail($id);
        return Storage::download($abscence->justification);
    }
    public function changeAbscenceType(Request $request, $id)
{
    Log::info('Change absence type called');
    try {
        $abscence = Abscence::findOrFail($id);
        \Log::info('Abscence found:', ['abscence' => $abscence]);

        $abscence->type_abscence = $request->type;
        $abscence->save();
        \Log::info('Abscence type updated to:', ['type' => $request->type]);

        // Envoyer la notification appropriée en fonction du type d'absence
        if ($request->type === 'acceptée') {
            \Log::info('Notifying user of accepted justification');
            $abscence->personnel->user->notify(new JustificationAccepteeNotification);
        } elseif ($request->type === 'refusée') {
            \Log::info('Notifying user of refused justification');
            $abscence->personnel->user->notify(new JustificationRefuseeNotification);
        }

        return response()->json(['success' => true, 'message' => 'Type d\'absence modifié avec succès.']);
    } catch (\Exception $e) {
        \Log::error('Error changing absence type:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'message' => 'Une erreur s\'est produite lors de la modification du type d\'absence.'], 500);
    }
}
}

