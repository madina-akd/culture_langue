<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Afficher le profil du lecteur
     */
    public function show()
    {
        $lecteur = Auth::user();
        $commentaires = Commentaire::where('id_utilisateur', $lecteur->id)
            ->with(['contenu', 'contenu.media'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('lecteur.profile.show', compact('lecteur', 'commentaires'));
    }

    /**
     * Afficher le formulaire d'édition du profil
     */
    public function edit()
    {
        $lecteur = Auth::user();
        return view('lecteur.profile.edit', compact('lecteur'));
    }

    /**
     * Mettre à jour le profil du lecteur
     */
    public function update(Request $request)
    {
        $lecteur = Auth::user();

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $lecteur->id,
            'sexe' => 'required|in:masculin,feminin',
            'mot_de_passe' => 'nullable|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'sexe' => $request->sexe,
        ];

        // Mettre à jour le mot de passe si fourni
        if ($request->filled('mot_de_passe')) {
            $data['mot_de_passe'] = $request->mot_de_passe;
        }
       
        // Gestion de la photo
        if ($request->hasFile('photo')) {
            
            $filename = time().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('assets/images'), $filename);
            $lecteur->update(['photo' => $filename]);
        }
        $lecteur->update($data);
        

        return redirect()->route('lecteur.profile.show')
                         ->with('success', 'Profil mis à jour avec succès.');
    }

    /**
     * Afficher les commentaires du lecteur
     */
    public function commentaires()
    {
        $lecteur = Auth::user();
        $commentaires = Commentaire::where('id_utilisateur', $lecteur->id)
            ->with(['contenu', 'contenu.media'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('lecteur.profile.commentaires', compact('lecteur', 'commentaires'));
    }
}
