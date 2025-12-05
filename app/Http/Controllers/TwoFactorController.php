<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;

class TwoFactorController extends Controller
{
    /**
     * Afficher la page d'activation 2FA avec QR Code
     */
    public function enableTwoFactor()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.form')->withErrors(['error' => 'Utilisateur non connecté']);
        }

        $google2fa = new Google2FA();

        // Générer une nouvelle clé secrète (ne pas sauvegarder tout de suite)
        $secret = $google2fa->generateSecretKey();
        
        // Stocker temporairement en session
        session(['twofactor_secret' => $secret]);

        // Générer l'URL pour Google Authenticator
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name', 'LesLanguesDuBenin'),
            $user->email,
            $secret
        );

        // Générer le QR Code en SVG
        try {
            $renderer = new ImageRenderer(
                new RendererStyle(250), // Taille augmentée pour meilleure lisibilité
                new SvgImageBackEnd()
            );
            $writer = new Writer($renderer);
            $qrCodeSvg = $writer->writeString($qrCodeUrl);
        } catch (\Exception $e) {
            // Fallback si la génération SVG échoue
            $qrCodeSvg = null;
            \Log::error('QR Code generation failed: ' . $e->getMessage());
        }

        return view('admin.enable', compact('qrCodeSvg', 'user', 'secret', 'qrCodeUrl'));
    }

    /**
     * Vérifier le code et activer la 2FA
     */
    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6'
        ]);

        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login.form')->withErrors(['error' => 'Utilisateur non connecté']);
        }

        // Récupérer la clé secrète temporaire
        $secret = session('twofactor_secret');
        
        if (!$secret) {
            return redirect()->route('twofactor.enable')
                ->withErrors(['code' => 'Session expirée. Veuillez recommencer le processus.']);
        }

        $google2fa = new Google2FA();
        
        // Vérifier le code avec une fenêtre de 4 codes (2 minutes)
        $valid = $google2fa->verifyKey($secret, $request->code, 4);

        if ($valid) {
            // Sauvegarder la clé et activer la 2FA
            $user->update([
                'google2fa_secret' => $secret,
                'twofactor_enabled' => true
            ]);

            // Nettoyer la session
            session()->forget('twofactor_secret');

            return redirect()->route('dashboard')
                ->with('success', 'Authentification à deux facteurs activée avec succès !');
        }

        return back()->withErrors(['code' => 'Code invalide. Assurez-vous d\'utiliser le code actuel de Google Authenticator.']);
    }

    /**
     * Désactiver la 2FA
     */
    public function disableTwoFactor()
    {
        $user = Auth::user();
        if ($user) {
            $user->update([
                'google2fa_secret' => null,
                'twofactor_enabled' => false
            ]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Authentification à deux facteurs désactivée.');
    }
}