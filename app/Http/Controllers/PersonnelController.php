<?php

namespace App\Http\Controllers;

use App\Models\abscence;
use App\Models\personnel;
use App\Models\mission;
use App\Models\conge;
use App\Models\Attestation;
use App\Models\AttestationSalaire;
use App\Models\AttestationTravail;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\PersonnelExport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Session\Session;

class PersonnelController extends Controller
{ public function acceuil(){
    return view('layouts.main');
}

public function create()
{
    return view('Accueil_directeur.create');
}

public function store(Request $request)
{
    Log::info('Début de la méthode store du PersonnelController.');

    $validated = $request->validate([
        'Nomper' => ['required'],
        'prenomper' => ['required'],
        'email' => ['required', 'email', 'unique:personnels,email'],
        'password' => ['required', 'confirmed'],
        'immat' => ['required', 'unique:personnels,immat'],
        'date_naissance' => ['required', 'date'],
        'grade' => ['required'],
        'CIN' => ['required', 'unique:personnels,CIN'],
        'date_affectation' => ['required', 'date'],
        'diplome' => ['required'],
        'lieu_naissance' => ['required'],
        'photo_profil' => ['required', 'file'],
        'role' => ['required', Rule::in(['personnel', 'directeur'])],
        'status' => ['required'],
    ]);

    Log::info('Validation des champs réussie.');

    try {
        $personnel = new Personnel();
        $personnel->Nomper = $request->Nomper;
        $personnel->prenomper = $request->prenomper;
        $personnel->email = $request->email;
        $personnel->password = Hash::make($request->password);
        $personnel->immat = $request->immat;
        $personnel->date_naissance = $request->date_naissance;
        $personnel->grade = $request->grade;
        $personnel->CIN = $request->CIN;
        $personnel->date_affectation = $request->date_affectation;
        $personnel->diplome = $request->diplome;
        $personnel->lieu_naissance = $request->lieu_naissance;
        $personnel->role = $request->role;
        $personnel->status = $request->status;

        // Gestion du téléchargement de la photo de profil
        if ($request->hasFile('photo_profil')) {
            $profile_picture = $request->file('photo_profil');
            $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
            $profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
            $personnel->photo_profil = $profile_picture_name;
            Log::info('Téléchargement de la photo de profil réussi.');
        }

        $personnel->save();
        Log::info('Personnel créé avec succès.');

        return redirect('/')->with('success', 'Personnel créé avec succès');
    } catch (\Exception $e) {
        Log::error('Erreur lors de la création du personnel: ' . $e->getMessage());
        return back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de la création du personnel. Veuillez réessayer.']);
    }
}
    public function showpersonnelabsence($id)
    {
        $personnels = personnel::findOrFail($id);
        $absences = $personnels->absences;

        return view('Accueil_personnel.abscence', compact('personnels', 'absences'));
    }


    public function showProfile($id)
    {
        $personnel = Personnel::where('immat', $id)->first(); // Récupère les informations personnelles de l'utilisateur
        $fonction =$personnel->fonction;
        return view('Accueil_personnel.profile', compact( 'personnel'));
    }
    //Affichage la liste des personnels
    public function index(){
        $personnels = personnel::orderBy('date_affectation')->get();;
        return view('Accueil_directeur.index',compact('personnels'));
    }


    //Exportation Excel

    public function export()
    {
        return Excel::download(new PersonnelExport, 'Personnels.xlsx');
    }
    //Modification de personnel
    public function edit($id)
    {
        //
        $personnel = personnel::where('immat', $id)->first();
        return view("Accueil_directeur.Edit")->with([
            "personnel" => $personnel
        ]);
    }
    //la fonction de update personnel
    public function update(Request $request, $id)
    {
        $personnel = personnel::where('immat', $id)->first();
        $personnel->update($request->all());
        return redirect()->route("showliste")->with([
            "success" => "Employe updated successfully"
        ]);
        return redirect('/')->with('success', 'Personnel mis à jour avec succès.');
    }
    public function isDirecteur()
    {
        return $this->role === 'directeur';
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function home()
    {
        $user = Auth::user();

        if ($user->role === 'personnel') {
            $absencesCount = abscence::where('immat_per', $user->immat)->count();
            $nonJustifiedAbscencesCount = abscence::where('immat_per', $user->immat)->whereNull('justification')->count();
            $missionsCount = Mission::where('personnel_id', $user->id)->count();
            $congesCount = Conge::where('personnel_id', $user->id)->count();
            $workAttestations = Attestation::where('personnel_id', $user->id)->where('type_attestation', 'travail')->get();
            $salaryAttestations = Attestation::where('personnel_id', $user->id)->where('type_attestation', 'salaire')->get();

            return view('Accueil_personnel.home', compact('absencesCount','nonJustifiedAbscencesCount', 'missionsCount', 'congesCount', 'workAttestations', 'salaryAttestations'));

        }
}


    //affichage des abscences
    public function mesabsc(){
        $user = Auth::user();
        $abscences = abscence::where('immat_per', $user->immat)->get();
        return view('Accueil_personnel.mesabsc', compact('abscences'));
    }

}


