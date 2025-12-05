<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LecteurAuthController extends Controller
{
    /**
     * Afficher le formulaire d'inscription lecteur
     */
    public function showRegistrationForm()
    {
        return view('lecteur.auth.register');
    }

    /**
     * Traiter l'inscription lecteur
     */
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required|min:8|confirmed',
            'sexe' => 'required|in:masculin,feminin',
        ]);


        $lecteur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe), // HASH ici !
            'id_role' => 5, 
            'id_langue' => 2, 
            'sexe' => $request->sexe,
            'date_inscription' => now(),
            'statut' => 'validé'
        ]);


        // Connecter automatiquement le lecteur
        Auth::guard('web')->login($lecteur);

        return redirect()->route('lecteur.login')
                         ->with('success', 'Inscription réussie ! Vous allez maintenant vous connecté.');
    }

    /**
     * Afficher le formulaire de connexion lecteur
     */
    public function showLoginForm()
    {
        return view('lecteur.auth.login');
    }

    /**
     * Traiter la connexion lecteur
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ]);

        $credentials = $request->only('email', 'mot_de_passe');

        if (Auth::guard('web')->attempt(['email' => $credentials['email'], 'password' => $credentials['mot_de_passe'], 'id_role' => 5])) {
            return redirect()->route('index')
                             ->with('success', 'Connexion réussie !');
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects ou vous n\'êtes pas inscrit en tant que lecteur.',
        ]);
    }

    /**
     * Déconnexion lecteur
     */
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('index')
                         ->with('success', 'Déconnexion réussie.');
    }
}
