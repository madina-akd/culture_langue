<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Paiement;
use App\Models\TypeContenu;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function index()
    {
        // Récupérer le type "recette" (supposons que l'ID est 1 pour les recettes)
        $typerecette = TypeContenu::where('nom', 'Recette')->first();
        
        // Récupérer les recettes avec leurs médias
        $recettes = Contenu::with(['media', 'region', 'langue', 'auteur'])
            ->where('id_type', $typerecette->id)
            ->where('statut', 'validé') // seulement les recettes validées
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lecteur.recette', compact('recettes'));
    }

    public function show($id, Request $request)
    {
        $recette = Contenu::with(['media', 'region', 'langue', 'auteur'])
            ->where('id', $id)
            ->where('statut', 'validé')
            ->firstOrFail();

       $emailLecteur = $request->session()->get('lecteur_email');
        $commentaires = $recette->commentaires()->with('utilisateur')->latest()->get();

        $aPaye = Paiement::where('contenu_id', $id)
            ->where('statut', 'paye')
            ->where('email_lecteur', $emailLecteur)
            ->exists();

        if (!$aPaye) {
            return redirect()->route('paiement.recette.initier', $id)
                ->with('error', 'Vous devez payer pour accéder à cette recette.');
        }

        return view('lecteur.recetteshow', compact('recette','aPaye','commentaires'));
    }
  
}