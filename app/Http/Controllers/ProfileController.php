<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show()
{
    //$user = auth()->user();
    
    //recuperer les donnees de base de donnees personnel
    return view('Accueil_personnel.profile', compact('user'));


}

}
