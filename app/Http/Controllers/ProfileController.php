<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $personnel = Auth::user();
        return view('profile.show', compact('personnel'));
    }
}
