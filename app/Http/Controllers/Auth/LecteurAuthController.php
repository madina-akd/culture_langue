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

        // Créer l'utilisateur avec le mot de passe hashé
        $lecteur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe, // Le mutator hash automatiquement
            'id_role' => 5,
            'id_langue' => 2,
            'sexe' => $request->sexe,
            'date_inscription' => now(),
            'statut' => 'validé'
        ]);

        // Connecter automatiquement le lecteur
        Auth::guard('web')->login($lecteur);

        return redirect()->route('index')
                         ->with('success', 'Inscription réussie ! Vous êtes maintenant connecté.');
    }

    /**
     * Afficher le formulaire de connexion lecteur
     */
    public function showLoginForm()
    {
        return view('lecteur.auth.login');
    }

    /**
     * Traiter la connexion lecteur - VERSION CORRIGÉE
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ]);

        // Chercher l'utilisateur avec email et rôle 5
        $lecteur = Utilisateur::where('email', $request->email)
                            ->where('id_role', 5)
                            ->first();

        // Vérifier si l'utilisateur existe
        if (!$lecteur) {
            return back()->withErrors([
                'email' => 'Aucun compte lecteur trouvé avec cet email.',
            ])->withInput();
        }

        // Vérifier le mot de passe en utilisant la méthode d'authentification de Laravel
        $credentials = [
            'email' => $request->email,
            'password' => $request->mot_de_passe, // Note: Laravel attend 'password' comme clé
            'id_role' => 5 // Vérification supplémentaire du rôle
        ];

        // OU utiliser la vérification manuelle :
        if (!Hash::check($request->mot_de_passe, $lecteur->mot_de_passe)) {
            return back()->withErrors([
                'mot_de_passe' => 'Mot de passe incorrect.',
            ])->withInput();
        }

        // Connexion manuelle
        Auth::guard('web')->login($lecteur);
        $request->session()->regenerate();

        return redirect()->route('index')->with('success', 'Connexion réussie !');
    }

    /**
     * Déconnexion lecteur
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')
                         ->with('success', 'Déconnexion réussie.');
    }
}
