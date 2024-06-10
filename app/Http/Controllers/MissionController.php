<?php
namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Personnel;
use App\Models\MoyenTransport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::all();
        return view('missions.index', compact('missions'));
    }

    public function create()
    {
        $personnels = Personnel::all();
        return view('missions.create', compact('personnels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_debut_mission' => 'required|date',
            'date_fin_mission' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'destination' => 'required',
            'objet' => 'required',
            'immat_pers' => '',
            'personnel_id' => 'required',
        ]);

        $mission = new Mission();
        $mission->date_debut_mission = $request->date_debut_mission;
        $mission->date_fin_mission = $request->date_fin_mission;
        $mission->heure_debut = $request->heure_debut;
        $mission->heure_fin = $request->heure_fin;
        $mission->destination = $request->destination;
        $mission->objet = $request->objet;
        $mission->immat_pers = $request->immat_pers;
        $mission->personnel_id = $request->personnel_id;
        $mission->save();

        return redirect()->route('missions.index')->with('success', 'Mission créée avec succès.');
    }

    public function edit(Mission $mission)
    {
        // Autoriser uniquement l'édition de missions par le directeur
        if (Auth::user()->role !== 'directeur') {
            return redirect()->route('missions.index')->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        $personnels = Personnel::all(); // Récupérer tous les personnels
        return view('missions.edit', compact('mission', 'personnels'));
    }


    public function update(Request $request, Mission $mission)
    {
        // Vérifier que la mission appartient au directeur
        if (Auth::user()->role !== 'directeur') {
            return redirect()->route('missions.index')->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        $request->validate([
            'date_debut_mission' => 'required|date',
            'date_fin_mission' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'destination' => 'required',
            'objet' => 'required',
            'immat_pers' => 'required',
            'personnel_id' => 'required',
        ]);

        $mission->update($request->all());

        return redirect()->route('missions.index')->with('success', 'Mission mise à jour avec succès.');
    }

    public function downloadPDF($id)
    {
        $mission = Mission::findOrFail($id);

        $pdf = PDF::loadView('missions.pdf', compact('mission'));
        return $pdf->download('ordre_mission_' . $mission->id . '.pdf');
    }


    public function personnelMissions()
    {
        // Récupérer les missions de l'utilisateur connecté
        $missions = Mission::where('personnel_id', Auth::id())->get();
        return view('missions.personnel-missions', compact('missions'));
    }

    public function fillTransportForm(Mission $mission)
    {
        // Vérifiez si l'utilisateur est autorisé à accéder à cette fonctionnalité
        if (Auth::user()->role !== 'personnel' || $mission->personnel_id !== Auth::id()) {
            return redirect()->route('missions.personnelMissions')->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        return view('missions.fill-transport-form', compact('mission'));
    }

    public function storeTransportForm(Request $request, Mission $mission)
    {
        // Validation des données du formulaire
        $request->validate([
            'type_trsp' => 'required|string|max:255',
            'num_immat' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'puissance_fiscale' => 'required|numeric',
        ]);

        // Création ou mise à jour du moyen de transport pour la mission
        $moyenTransport = new MoyenTransport();
        $moyenTransport->mission_id = $mission->id;
        $moyenTransport->type_trsp = $request->type_trsp;
        $moyenTransport->num_immat = $request->num_immat;
        $moyenTransport->marque = $request->marque;
        $moyenTransport->puissance_fiscale = $request->puissance_fiscale;
        $moyenTransport->save();

        return redirect()->route('missions.personnelMissions')->with('success', 'Formulaire de moyen de transport enregistré.');
    }

    public function downloadMissionOrder(Mission $mission)
    {
        // Vérifiez si l'utilisateur est autorisé à accéder à cette fonctionnalité
        if (Auth::user()->role !== 'personnel' || $mission->personnel_id !== Auth::id()) {
            return redirect()->route('missions.personnelMissions')->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        $moyenTransport = MoyenTransport::where('mission_id', $mission->id)->first();

        $pdf = PDF::loadView('missions.mission-order', compact('mission', 'moyenTransport'));
        return $pdf->download('ordre_mission_' . $mission->id . '.pdf');
    }

}
