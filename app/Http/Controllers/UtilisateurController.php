<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Log;
class UtilisateurController extends Controller
{
    
    /**
     * Liste des utilisateurs
     */
    public function index()
    {
        $utilisateurs = Utilisateur::with(['role', 'langue'])->get();
        return view('Utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        $roles = Role::all();
        $langues = Langue::all();
        return view('Utilisateurs.create', compact('roles', 'langues'));
}

    /**
     * Enregistrement d’un utilisateur
     */
    

    // Suite logique (upload photo, hash mot de passe, etc.)
    

    public function store(Request $request)
    {
        Log::info('=== DÉBUT CRÉATION COMPTE ===');
        Log::info('Données reçues:', $request->all());
        
        $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:utilisateurs,email',
        'mot_de_passe' => 'required|string|min:6|confirmed',
        'id_role' => 'required|exists:roles,id',
        'id_langue' => 'nullable|exists:langue,id',
        'sexe' => 'required|in:masculin,feminin',
        'photo' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $email = $request->email;
        $domain = substr(strrchr($email, "@"), 1);

        if (!checkdnsrr($domain, "MX")) {
            return back()->withErrors(['email' => 'Le domaine de l’email n’existe pas ou n’accepte pas de mails.'])
                        ->withInput();
        }

        try {
            // Préparer les données
            $data = $request->except('mot_de_passe', 'photo', '_token');
            
            // Hacher le mot de passe
            $data['mot_de_passe'] = Hash::make($request->mot_de_passe);
            
            // Date d'inscription
            $data['date_inscription'] = now();
            
            // Statut par défaut
           
            $data = $request->except('photo');
            // Gestion de la photo
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('assets/images'), $photoName);
                $data['photo'] = $photoName;
            }
            
            // IMPORTANT: Gestion de la 2FA selon le rôle
            Log::info('Rôle sélectionné: ' . $request->id_role);
            
            if ($request->id_role == 6) { // Manager
                Log::info('Création d\'un compte Manager - Traitement 2FA');
                
                // Option 1: Générer un secret 2FA mais ne pas l'activer immédiatement
                // L'utilisateur devra l'activer lors de sa première connexion
                $google2fa = new Google2FA();
                $data['google2fa_secret'] = $google2fa->generateSecretKey();
                $data['twofactor_enabled'] = false; // Pas activé par défaut
                
                Log::info('Secret 2FA généré pour manager (non activé)');
                
            } elseif ($request->id_role == 3) { // Admin
                Log::info('Création d\'un compte Admin - Traitement 2FA');
                
                // Pour les admins, activer la 2FA immédiatement
                $google2fa = new Google2FA();
                $data['google2fa_secret'] = $google2fa->generateSecretKey();
                $data['twofactor_enabled'] = true;
                
                Log::info('Secret 2FA généré pour admin (activé)');
                
            } else {
                // Pour les autres rôles (auteur, lecteur, etc.)
                $data['google2fa_secret'] = null;
                $data['twofactor_enabled'] = false;
                
                Log::info('Pas de 2FA pour les autres rôles');
            }
            
            // Créer l'utilisateur
            $utilisateur = Utilisateur::create($data);
            
            Log::info('Utilisateur créé avec succès:', [
                'id' => $utilisateur->id,
                'email' => $utilisateur->email,
                'role' => $utilisateur->id_role,
                '2fa_enabled' => $utilisateur->twofactor_enabled
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Compte créé avec succès!',
                'user_id' => $utilisateur->id,
                'is_manager' => $request->id_role == 6,
                'needs_2fa_setup' => $request->id_role == 6 // Le manager devra configurer la 2FA
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur création compte:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création du compte: ' . $e->getMessage()
            ], 500);
        }
    }
    
 

    
    public function show(Utilisateur $utilisateur)
    {
        return view('Utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Formulaire d’édition
     */
    public function edit(Utilisateur $utilisateur)
    {
        $roles = Role::all();
        $langues = Langue::all();
        return view('Utilisateurs.edit', compact('utilisateur', 'roles', 'langues'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'id_role' => 'required|exists:roles,id',
            'id_langue' => 'nullable|exists:langue,id',
            'sexe' => 'required|in:masculin,feminin',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('photo', 'mot_de_passe');

        // Upload d'une nouvelle photo
        if ($request->hasFile('photo')) {

            // Supprimer l’ancienne photo si existe
            if ($utilisateur->photo && file_exists(public_path($utilisateur->photo))) {
                unlink(public_path($utilisateur->photo));
            }

            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('assets/images'), $filename);
            $data['photo'] = 'assets/images/' . $filename;
        }

        // Mot de passe
        if (!empty($request->mot_de_passe)) {
            $data['mot_de_passe'] = bcrypt($request->mot_de_passe);
        }

        $utilisateur->update($data);

        return redirect()->route('utilisateur.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Suppression
     */
    public function destroy(Utilisateur $utilisateur)
    {
        // Suppression de la photo
        if ($utilisateur->photo && file_exists(public_path($utilisateur->photo))) {
            unlink(public_path($utilisateur->photo));
        }

        $utilisateur->delete();

        return redirect()->route('utilisateur.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Validation
     */
    public function valider(Utilisateur $utilisateur)
    {
        $utilisateur->update(['statut' => 'validé']);
        return redirect()->route('utilisateur.index')
            ->with('success', 'Utilisateur validé avec succès.');
    }

    /**
     * Désapprouver
     */
    public function desapprouver(Utilisateur $utilisateur)
    {
        $utilisateur->update(['statut' => 'en attente']);
        return redirect()->route('utilisateur.index')
            ->with('success', 'Utilisateur remis en attente.');
    }
}
