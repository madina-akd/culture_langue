<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Paiement;
use Illuminate\Http\Request;

class HistoireController extends Controller
{
    public function index()
    {
        $histoires = Contenu::with(['media', 'region', 'langue', 'auteur', 'type'])
            ->whereHas('type', fn($q) => $q->whereIn('nom', ['Histoire', 'Conte']))
            ->where('statut', 'validé')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lecteur.histoire', compact('histoires'));
    }

    public function show($id, Request $request)
    {
        $histoire = Contenu::with(['media', 'region', 'langue', 'auteur', 'type'])
            ->where('id', $id)
            ->where('statut', 'validé')
            ->firstOrFail();

        $emailLecteur = $request->session()->get('lecteur_email');
         $commentaires = $histoire->commentaires()->with('utilisateur')->latest()->get();


        $aPaye = Paiement::where('contenu_id', $id)
            ->where('statut', 'paye')
            ->where('email_lecteur', $emailLecteur)
            ->exists();

        if (!$aPaye) {
            return redirect()->route('paiement.histoire.initier', $id)
                ->with('error', 'Vous devez payer pour accéder à cette histoire.');
        }

        return view('lecteur.histoireshow', compact('histoire','aPaye','commentaires'));
    }
}
