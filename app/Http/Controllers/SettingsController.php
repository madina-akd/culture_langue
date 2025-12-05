<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;

class SettingsController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Mettre à jour nom et email
        $user->update([
            'nom'   => $request->input('nom'),
            'email' => $request->input('email'),
        ]);

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            
            $filename = time().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('assets/images'), $filename);
            $user->update(['photo' => $filename]);
        }

        return back()->with('success', 'Profil mis à jour');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'      => 'required',
            'new_password'          => 'required|confirmed|min:6',
        ]);

        $user = auth()->user();

        // Vérification du mot de passe actuel
        if (!Hash::check($request->current_password, $user->mot_de_passe)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect']);
        }

        // Mise à jour du mot de passe
        $user->update(['mot_de_passe' => bcrypt($request->new_password)]);

        return back()->with('success', 'Mot de passe changé');
    }
    

    
}
