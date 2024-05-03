<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Conge;

class CongeController extends Controller
{

    public function creation()
        {
            return view('demande-conge');
        }
    public function create(Request $request)
    {


        // Validation des données du formulaire
        $request->validate([
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
            'remplacement' => ['required', 'string'],
        ]);

        // Créer la demande de congé
        $conge = new Conge();
        $conge->date_debut = $request->date_debut;
        $conge->date_fin = $request->date_fin;
        $conge->remplacement = $request->remplacement;
        $conge->immat_per = Auth::user()->immat;
        $conge->save();

        return redirect()->back()->with('message', 'Demande de congé envoyée avec succès.');
    }

    public function delete($id)
    {
        // Vérifier si la demande de congé appartient à l'utilisateur connecté
        $conge = Conge::find($id);
        if ($conge && $conge->immat_per === Auth::user()->immat) {
            $conge->delete();
            return redirect()->back()->with('message', 'Demande de congé supprimée avec succès.');
        }

        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cette demande de congé.');
    }
}

