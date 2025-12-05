<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Log; // Ajout pour le logging

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Debug: log de la tentative
        Log::info('Tentative de connexion', [
            'email' => $request->email,
            'ip' => $request->ip()
        ]);

        $user = Utilisateur::where('email', $request->email)->first();

        if (!$user) {
            Log::warning('Utilisateur non trouvé', ['email' => $request->email]);
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
        }

        // Debug: log des informations de l'utilisateur
        Log::info('Utilisateur trouvé', [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->id_role,
            '2fa_enabled' => $user->twofactor_enabled,
            '2fa_secret' => $user->google2fa_secret ? 'Oui' : 'Non'
        ]);

        // Vérifier le mot de passe
        if (!Hash::check($request->password, $user->mot_de_passe)) {
            Log::warning('Mot de passe incorrect', ['email' => $request->email]);
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
        }

        // Vérifier le statut de l'utilisateur
        if ($user->statut !== 'validé') {
            Log::warning('Utilisateur non actif', [
                'email' => $user->email,
                'statut' => $user->statut
            ]);
            return back()->withErrors(['email' => 'Votre compte n\'est pas actif. Veuillez contacter l\'administrateur.']);
        }

        // Gestion des rôles
        $adminRoles = [3, 6]; // Admin (3) et Manager (6)
       

        // Vérifier si l'utilisateur est admin/manager
        if (in_array($user->id_role, $adminRoles)) {
            Log::info('Utilisateur admin/manager détecté', [
                'email' => $user->email,
                'role' => $user->id_role
            ]);

            // Cas 1 : 2FA pas encore activée
            if (!$user->twofactor_enabled || !$user->google2fa_secret) {
                Log::info('2FA non activée, redirection vers activation', ['user_id' => $user->id]);
                Auth::login($user);
                return redirect()->route('twofactor.enable');
            }

            // Cas 2 : 2FA activée → demander code OTP
            Log::info('2FA activée, redirection vers formulaire', ['user_id' => $user->id]);
            session(['twofactor_user_id' => $user->id]);
            return redirect()->route('twofactor.form');
        }
        
       

        // Autres rôles (lecteurs, etc.)
        if ($user->id_role == 5) { // Exemple: rôle lecteur
            Log::info('Utilisateur lecteur détecté', [
                'email' => $user->email,
                'role' => $user->id_role
            ]);
            Auth::login($user);
            return redirect()->route('home');
        }

        Log::warning('Rôle non autorisé', [
            'email' => $user->email,
            'role' => $user->id_role
        ]);
        
        return back()->withErrors(['email' => 'Vous n\'avez pas les droits d\'accès.']);
    }

    public function showTwoFactorForm()
    {
        if (!session('twofactor_user_id')) {
            return redirect()->route('login.form')->withErrors(['error' => 'Session expirée.']);
        }
        
        $user = Utilisateur::find(session('twofactor_user_id'));
        
        if (!$user) {
            return redirect()->route('login.form')->withErrors(['error' => 'Utilisateur introuvable.']);
        }
        
        return view('admin.login2', compact('user'));
    }

    public function verifyTwoFactor(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);

        if (!session('twofactor_user_id')) {
            return redirect()->route('login.form')->withErrors(['error' => 'Session expirée.']);
        }

        $user = Utilisateur::find(session('twofactor_user_id'));

        if (!$user) {
            Log::error('Utilisateur 2FA introuvable', ['session_id' => session('twofactor_user_id')]);
            return redirect()->route('login.form')->withErrors(['code' => 'Utilisateur introuvable']);
        }

        if (!$user->google2fa_secret) {
            Log::error('Secret 2FA manquant', ['user_id' => $user->id]);
            return redirect()->route('login.form')->withErrors(['code' => 'Configuration 2FA incomplète']);
        }

        $google2fa = new Google2FA();
        
        // Vérifier avec une fenêtre de tolérance (en cas de décalage horaire)
        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code, 2);

        if ($valid) {
            Log::info('Connexion 2FA réussie', ['user_id' => $user->id]);
            
            Auth::login($user);
            
            // Supprimer la session 2FA
            session()->forget('twofactor_user_id');
            
            // Vérifier le rôle pour redirection appropriée
            if (in_array($user->id_role, [3, 6])) {
                return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
            }
            
            return redirect()->intended('/');
        }

        Log::warning('Code 2FA invalide', ['user_id' => $user->id]);
        return back()->withErrors(['code' => 'Code invalide. Veuillez réessayer.']);
    }

    public function logout()
    {
        $user = Auth::user();
        Log::info('Déconnexion', ['user_id' => $user?->id, 'email' => $user?->email]);
        
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route('login.form')->with('success', 'Déconnexion réussie.');
    }

    public function lockscreen()
    {
        $user = Auth::check() ? Auth::user() : null;
        
        if (!$user) {
            return redirect()->route('login.form');
        }
        
        // Sauvegarder l'ID utilisateur en session pour le déverrouillage
        session(['lockscreen_user_id' => $user->id]);
        
        Auth::logout();
        
        return view('admin.lockscreen', compact('user'));
    }
}
