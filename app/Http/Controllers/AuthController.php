<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Valider les données du formulaire de connexion
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tentative de connexion de l'utilisateur
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a un rôle
        if ($user->role) {
            // Charger la relation 'role'
            $user->load('role');

            // Redirection en fonction du rôle de l'utilisateur
            if ($user->role->name === 'directeur') {
                return redirect()->route('accueildire');
            } else {
                return redirect()->route('accueil');
            }
        } else {
            // Gérer le cas où l'utilisateur n'a pas de rôle associé
            Auth::logout();
            return back()->withErrors([
                'email' => 'Cet utilisateur n\'a pas de rôle associé.',
            ]);
        }
    }

    // Redirection en cas d'échec de l'authentification
    return back()->withErrors([
        'email' => 'Les informations d\'identification fournies ne sont pas valides.',
    ]);
}

}

