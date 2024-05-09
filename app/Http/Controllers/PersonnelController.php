<?php

namespace App\Http\Controllers;




use App\Models\personnel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class PersonnelController extends Controller
{

    public function create()
    {
        return view('Accueil_directeur.create');

    }
// fonction store
    public function store(Request $request)
    {
        $request->validate([
            'Nomper' => ['required'],
            'prenomper' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'immat' => ['required'],
            'date_naissance' => ['required', 'date'],
            'grade' => ['required'],
            'CIN' => ['required'],
            'date_affectation' => ['required', 'date'],
            'diplome' => ['required'],
            'lieu_naissance' => ['required'],
            'photo_profil' => ['required']
        ]);

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

            // Gestion du téléchargement de la photo de profil
            if ($request->hasFile('photo_profil')) {
                $profile_picture = $request->file('photo_profil');
                $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
                $profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
                $personnel->photo_profil = $profile_picture_name;
            }

            $personnel->save();

            return redirect('/')->with('success', 'Personnel créé avec succès');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de la création du personnel. Veuillez réessayer.']);
        }
    }

    public function showpersonnelabsence($id)
    {
        $personnels = personnel::findOrFail($id);
        $absences = $personnels->absences;

        return view('Accueil_personnel.abscence', compact('personnels', 'absences'));
    }

    public function showProfile()
    {
        $user = auth()->user(); // Récupère l'utilisateur authentifié
        $personnel = Personnel::where('email', $user->email)->first(); // Récupère les informations personnelles de l'utilisateur
        return view('profile.show', compact('user', 'personnel'));
    }
    //Affichage la liste des personnels
    public function index(){
        $personnels = personnel::orderBy('date_affectation')->get();;
        return view('Accueil_directeur.index',compact('personnels'));
    }
}
