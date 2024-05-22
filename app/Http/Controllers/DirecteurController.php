<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\conge;
use App\Models\mission;
use App\Models\abscence;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DirecteurController extends Controller
{
    public function create()
{
    return view('Accueil_directeur.createdire');
}
    public function index(){
       // Dashboard statistics
       $totalPers = Personnel::count();
       $totalAbsence = Abscence::count();
       $totalConge = Conge::count();
       $totalMission = Mission::count();
       $todaysAbsences = Abscence::whereDate('date_debut', '<=', now())
                              ->whereDate('date_fin', '>=', now())
                              ->join('personnels', 'abscences.immat_per', '=', 'personnels.immat')
                              ->select('abscences.*', 'personnels.Nomper', 'personnels.prenomper')
                              ->get();
        $totalTodaysAbsences = $todaysAbsences->count();


        return view('Accueil_directeur.home', [
            'data' => [
                'totalPers' => $totalPers,
                'totalAbsence' => $totalAbsence,
                'totalConge' => $totalConge,
                'totalMission' => $totalMission,
                'totalTodaysAbsences' => $totalTodaysAbsences,

            ],
            'todaysAbsences' => $todaysAbsences,
        ]);
    }

public function store(Request $request)
{
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'Nomper' => 'required|string',
        'prenomper' => 'required|string',
        'email' => 'required|email|unique:personnels,email',
        'password' => 'required|string',
        'immat' => 'required|string|unique:personnels,immat',
        'date_naissance' => 'required|date',
        'grade' => 'required|string',
        'CIN' => 'required|string|unique:personnels,CIN',
        'date_affectation' => 'required|date',
        'diplome' => 'required|string',
        'lieu_naissance' => 'required|string',
        'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Manipulation du fichier photo_profil s'il est téléchargé
    if ($request->hasFile('photo_profil')) {
        $validatedData['photo_profil'] = $request->file('photo_profil')->store('photos_profil', 'public');
    }

    // Création du directeur
    $directeur = new Personnel();
    $directeur->fill($validatedData);
    $directeur->role_id = Role::where('name', 'directeur')->first()->id;
    $directeur->password = bcrypt($validatedData['password']); // Assurez-vous de hasher le mot de passe
    $directeur->save();

    return redirect()->route('accueildire')->with('success', 'Le compte directeur a été créé avec succès.');
}

}
