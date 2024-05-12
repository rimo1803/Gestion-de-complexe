<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckDirecteurRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('directeur')) {
            dd('Directeur'); // Vérifiez si cette ligne est atteinte
            return $next($request);
        }

        dd('Non directeur'); // Vérifiez si cette ligne est atteinte
        // Rediriger l'utilisateur vers une autre page s'il n'est pas un directeur
        return redirect('/')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }


}
