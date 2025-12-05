<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuteurAuthController extends Controller
{
    /**
     * Afficher le formulaire d'inscription auteur
     */
    public function showRegistrationForm()
    {
        return view('auteur.auteur-register');
    }

    /**
     * Traiter l'inscription auteur
     */
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required|min:8|confirmed',
            'sexe' => 'required|in:homme,femme',
        ]);

        // Créer l'utilisateur avec le rôle auteur (id_role = 1)
        $auteur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe, // Mutator hash automatiquement
            'id_role' => 1,
            'sexe' => $request->sexe,
            'date_inscription' => now(),
            'statut' => 'en attente', // Ou 'validé' si tu veux valider directement
        ]);

        return redirect()->route('auteur.registration.confirmation')
                         ->with('success', 'Votre inscription a été soumise avec succès !');
    }

    /**
     * Afficher la page de confirmation d'inscription
     */
    public function showRegistrationConfirmation()
    {
        return view('auteur.auteur-registration-confirmation');
    }

    /**
     * Afficher le formulaire de connexion auteur
     */
    public function showLoginForm()
    {
        return view('auteur.auteur-login');
    }

    /**
     * Traiter la connexion auteur
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ]);

        $auteur = Utilisateur::where('email', $request->email)
                              ->where('id_role', 1)
                              ->first();

        if (!$auteur) {
            return back()->withErrors([
                'email' => 'Aucun compte auteur trouvé avec cet email.',
            ])->withInput();
        }

        if (!Hash::check($request->mot_de_passe, $auteur->mot_de_passe)) {
            return back()->withErrors([
                'mot_de_passe' => 'Mot de passe incorrect.',
            ])->withInput();
        }

        if ($auteur->statut === 'en attente') {
            return back()->withErrors([
                'email' => 'Votre compte est en attente de validation par un administrateur.',
            ])->withInput();
        }

     

        return redirect()->route('auteur.dashboard')->with('success', 'Connexion réussie !');
    }

    /**
     * Déconnexion auteur
     */
    public function logout(Request $request)
    {
        Auth::guard('auteur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Déconnexion réussie.');
    }
}
