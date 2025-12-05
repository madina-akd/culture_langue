<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    
    /**
     * Ajouter un commentaire
     */
    public function store(Request $request, $contenuId)
    {
        $request->validate([
            'texte' => 'required|string|min:3|max:1000',
            'note' => 'required|numeric|min:0|max:5'
        ]);

        $contenu = Contenu::findOrFail($contenuId);

        $commentaire = Commentaire::create([
            'texte' => $request->texte,
            'note' => $request->note,
            'date' => now(),
            'id_utilisateur' => Auth::id(),
            'id_contenu' => $contenu->id
        ]);

        // Charger les relations pour l'affichage
        $commentaire->load('utilisateur');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'commentaire' => $commentaire,
                'message' => 'Commentaire ajouté avec succès!'
            ]);
        }

        return back()->with('success', 'Commentaire ajouté avec succès!');
    }

    /**
     * Supprimer un commentaire
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        // Vérifier que l'utilisateur est l'auteur du commentaire
        if (Auth::id() != $commentaire->id_utilisateur) {
            if (request()->ajax()) {
                return response()->json(['error' => 'Non autorisé'], 403);
            }
            return back()->withErrors(['error' => 'Non autorisé']);
        }

        $commentaire->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Commentaire supprimé avec succès!'
            ]);
        }

        return back()->with('success', 'Commentaire supprimé avec succès!');
    }

    /**
     * Afficher le formulaire d'édition d'un commentaire
     */
    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        // Vérifier que l'utilisateur est l'auteur du commentaire
        if (Auth::id() != $commentaire->id_utilisateur) {
            return back()->withErrors(['error' => 'Non autorisé']);
        }

        $commentaire->load('contenu');

        return view('lecteur.commentaire.edit', compact('commentaire'));
    }

    /**
     * Mettre à jour un commentaire
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required|string|min:3|max:1000',
            'note' => 'required|numeric|min:0|max:5'
        ]);

        $commentaire = Commentaire::findOrFail($id);

        // Vérifier que l'utilisateur est l'auteur du commentaire
        if (Auth::id() != $commentaire->id_utilisateur) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Non autorisé'], 403);
            }
            return back()->withErrors(['error' => 'Non autorisé']);
        }

        $commentaire->update([
            'texte' => $request->texte,
            'note' => $request->note,
            'date' => now()
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'commentaire' => $commentaire,
                'message' => 'Commentaire mis à jour avec succès!'
            ]);
        }

        return back()->with('success', 'Commentaire mis à jour avec succès!');
    }
}