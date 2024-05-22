<?php

namespace App\Http\Controllers;

use App\Models\abscence;
use App\Models\personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AbscenceController extends Controller
{
    public function showabs(){
        $abscences = Abscence::with('personnel')->get();
        return view('Accueil_directeur.abscence',compact('abscences'));
    }
    public function showpersonnelabsence()
    {
        $personnel = Auth::user();
        $absences = $personnel->absences;

        return view('Accueil_personnel.abscence', compact('absences'));
    }
}

