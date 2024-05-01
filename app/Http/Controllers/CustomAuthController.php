<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    // Validation des données du formulaire
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Tentative de connexion de l'utilisateur
    if (Auth::attempt($credentials)) {
        // Authentification réussie
        return redirect()->intended('/dashboard');
    } else {
        // Authentification échouée
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes.',
        ]);
    }
}

public function logout()
{
    Auth::logout();
    return redirect('/login');
}
public function __construct()
{

    $this->middleware('auth')->except('showLoginForm', 'login');
}

}
