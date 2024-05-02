<?php

namespace App\Http\Controllers;


use App\Models\personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    //
    public function showpersonnelabsence($id)
    {
        $personnels = personnel::findOrFail($id);
        $absences = $personnels->absences;

        return view('Accueil_personnel.abscence', compact('personnels', 'absences'));
    }

}
