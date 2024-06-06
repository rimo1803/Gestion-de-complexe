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
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember_me');
    if (Auth::attempt($credentials,$remember)) {
        $request->session()->regenerate();
        $user = Auth::user();
        switch ($user->role) {
            case 'directeur':
                return redirect()->intended(route('accueildire'))->withSuccess('You have Successfully logged in');
            case 'personnel':
                return redirect()->intended(route('accueil'))->withSuccess('You have Successfully logged in');
            default:
                return redirect('login')->withErrors('Role not recognized.');
        }
    }
    return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
}

/**
 * Write code on Method
 *
 * @return response()
 */
/**
 * Write code on Method
 *
 * @return response()
 */
/**
 * Write code on Method
 *
 * @return response()
 */
public function logout(Request $request)
{
    $request->session()->flush();
    return redirect('/')->withSuccess('You have successfully logged out.');
}
}
