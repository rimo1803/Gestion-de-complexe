<?php

namespace App\Http\Controllers;

use App\Models\abscence;
use Illuminate\Http\Request;


class AbscenceController extends Controller
{
    public function showabs(){
        $abscences =abscence::orderBy('date_debut')->get();;
        return view('Accueil_directeur.abscence',compact('abscences'));
    }


    }

