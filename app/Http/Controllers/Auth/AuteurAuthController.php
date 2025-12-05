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

        // Créer l'utilisateur avec le rôle auteur (id_role = 2 par exemple)
        $auteur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe, // Le mutator hash automatiquement
           // ID du rôle auteur
            'sexe' => $request->sexe,
           
            'date_inscription' => now(),
            
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

        $credentials = [
            'email' => $request->email,
            'password' => $request->mot_de_passe, // Laravel attend 'password' par défaut
            'id_role' => 1 // S'assurer que c'est bien un auteur
        ];

        if (Auth::guard('auteur')->attempt($credentials)) {// Vérifier si le compte est validé
            $user = Auth::guard('auteur')->user();
            
            if ($user->statut === 'en attente') {
                Auth::guard('auteur')->logout();
                return back()->withErrors([
                    'email' => 'Votre compte est en attente de validation par un administrateur.',
                ]);
            }
            return redirect()->route('auteur.dashboard')
                             ->with('success', 'Connexion réussie !');
        }

        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects ou vous n\'êtes pas autorisé à vous connecter.',
        ]);
    }

    /**
     * Déconnexion auteur
     */
    public function logout()
    {
        Auth::guard('auteur')->logout();
        return redirect()->route("{{ route('index') }}#contenus")
                         ->with('success', 'Déconnexion réussie.');
    }
}