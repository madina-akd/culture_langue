<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuteurMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('auteur')->check()) {
            return redirect()->route('auteur.login');
        }

        $user = Auth::guard('auteur')->user();
        
        // Vérifier si c'est bien un auteur
        if (!$user->isAuteur()) {
            Auth::guard('auteur')->logout();
            return redirect()->route('auteur.login')->withErrors(['email' => 'Accès non autorisé.']);
        }

        // Vérifier si le compte est validé
        if ($user->statut !== 'validé') {
            Auth::guard('auteur')->logout();
            
            if ($user->statut === 'en attente') {
                return redirect()->route('auteur.login')
                                 ->withErrors(['email' => 'Votre compte est en attente de validation.']);
            }
            
           
        }

        return $next($request);
    }
}