<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Admin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            Log::warning('Accès non autorisé: utilisateur non connecté');
            return redirect()->route('login.form');
        }

        // Rôles autorisés: 3 (Admin), 6 (Manager)
        // Note: Le rôle 1 (Auteur) n'est plus autorisé ici
        if (!in_array($user->id_role, [3, 6])) {
            Log::warning('Accès refusé: rôle non autorisé', [
                'user_id' => $user->id,
                'role' => $user->id_role
            ]);
            abort(403, 'Accès refusé ! Seuls les administrateurs et managers peuvent accéder à cette section.');
        }

        // Vérifier si le compte est actif
        if ($user->statut !== 'validé') {
            Log::warning('Compte non actif', [
                'user_id' => $user->id,
                'email' => $user->email,
                'statut' => $user->statut
            ]);
            Auth::logout();
            return redirect()->route('login.form')
                ->withErrors(['email' => 'Votre compte a été désactivé. Contactez l\'administrateur.']);
        }

        return $next($request);
    }
}