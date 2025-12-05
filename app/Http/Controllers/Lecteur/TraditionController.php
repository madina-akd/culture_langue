<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Paiement;
use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TraditionController extends Controller
{
    public function index()
    {
        // Récupérer le type "tradition" (supposons que l'ID est 1 pour les traditions)
        $typetradition = TypeContenu::where('nom', 'Tradition')->first();
        
        // Récupérer les traditions avec leurs médias
        $traditions = Contenu::with(['media', 'region', 'langue', 'auteur'])
            ->where('id_type', $typetradition->id)
            ->where('statut', 'validé') // seulement les traditions validées
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lecteur.tradition', compact('traditions'));
    }

    public function show($id, Request $request)
    {
        $tradition = Contenu::with(['media', 'region', 'langue', 'auteur'])
            ->where('id', $id)
            ->where('statut', 'validé')
            ->firstOrFail();
        
           $emailLecteur = $request->session()->get('lecteur_email');
         $commentaires = $tradition->commentaires()->with('utilisateur')->latest()->get();

        $aPaye = Paiement::where('contenu_id', $id)
            ->where('statut', 'paye')
            ->where('email_lecteur', $emailLecteur)
            ->exists();

        if (!$aPaye) {
            return redirect()->route('paiement.tradition.initier', $id)
                ->with('error', 'Vous devez payer pour accéder à cette tradition.');
        }

        return view('lecteur.traditionshow', compact('tradition', 'aPaye','commentaires'));

    }
}
