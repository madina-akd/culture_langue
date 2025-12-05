<?php

namespace App\Http\Controllers\Auteur;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuteurDashboardController extends Controller
{
    /**
     * Afficher le dashboard auteur
     */
     public function index()
    {
        $auteur = Auth::guard('auteur')->user();
        
        // Statistiques des contenus de l'auteur
        $contenus = Contenu::where('id_auteur', $auteur->id)->get();
        
        $stats = [
            'total' => $contenus->count(),
            'valides' => $contenus->where('statut', 'validé')->count(),
            'en_attente' => $contenus->where('statut', 'en attente')->count(),
           
        ];

        // Derniers contenus (pour le tableau)
        $derniersContenus = Contenu::where('id_auteur', $auteur->id)
                                  ->with(['type', 'region', 'langue'])
                                  ->orderBy('created_at', 'desc')
                                  ->take(5)
                                  ->get();

        return view('auteur.dashboard', compact('stats', 'derniersContenus', 'auteur', 'contenus'));
    }

    /**
     * Afficher le formulaire de création de contenu
     */
    public function profile()
    {
        $auteur = Auth::guard('auteur')->user();
        return view('auteur.profile', compact('auteur'));
    }

    public function create()
    {
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();

        return view('auteur.contenu-create', compact('types', 'regions', 'langues'));
    }

    /**
     * Stocker un nouveau contenu
     */
   

    public function updateProfile(Request $request)
    {
        $auteur = Auth::guard('auteur')->user();
        
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $auteur->id,
        ]);

        $auteur->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
        ]);

        return redirect()->route('auteur.profile')
                         ->with('success', 'Profil mis à jour avec succès.');
    }

    
}