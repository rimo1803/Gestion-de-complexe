<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

use App\Models\Conge;

class CongeController extends Controller
{
    public function creation()
        {
            return view('Accueil_personnel.demande-conge');

        }
        public function demanderConge(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $dateDebut = Carbon::parse($request->date_debut);
        $dateFin = Carbon::parse($request->date_fin);

        $conge = new Conge();
        $conge->date_debut = $dateDebut;
        $conge->date_fin = $dateFin;
        $conge->descision_conje = 'En attente';
        $conge->remplacement = 'En attente';
        $conge->redicat = $dateFin->diffInDays(Carbon::now()); // Calcul du nombre de jours restants
        $conge->immat_per = Auth::user()->immat;
        $conge->save();

        return redirect()->back()->with('success', 'Demande de congé envoyée avec succès.');
    }


        public function validerDemandeConge($id)
{
    $conge = Conge::findOrFail($id);
    $conge->decision_conje = 'Validé'; // Mettre à jour la décision du congé
    $conge->save();

    // Envoyer le document de décision au formateur par email ou autre méthode

    return redirect()->back()->with('success', 'Demande de congé validée avec succès.');
}

public function refuserDemandeConge($id)
{
    $conge = Conge::findOrFail($id);
    $conge->decision_conge = 'Refusé'; // Mettre à jour la décision du congé
    $conge->save();

    // Envoyer le document de décision au formateur par email ou autre méthode

    return redirect()->back()->with('success', 'Demande de congé refusée avec succès.');
}

    }

