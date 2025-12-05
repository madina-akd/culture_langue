<?php

namespace App\Http\Controllers\Auteur;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContenuController extends Controller
{
    /**
     * Afficher la liste des contenus de l'auteur
     */
    public function index(Request $request)
{
    $auteur = Auth::guard('auteur')->user();
    $typeFiltre = $request->get('type');
    
    $query = Contenu::where('id_auteur', $auteur->id)
                   ->with(['type', 'region', 'langue']);

    // Filtrer par type si spécifié
    if ($typeFiltre) {
        $query->whereHas('type', function($q) use ($typeFiltre) {
            // Gestion des types multiples
            if ($typeFiltre == 'histoire') {
                $q->whereIn('nom', ['histoire', 'conte', 'légende']);
            } elseif ($typeFiltre == 'tradition') {
                $q->whereIn('nom', ['tradition', 'danse', 'coutume', 'cérémonie']);
            } else {
                $q->where('nom', 'like', '%' . $typeFiltre . '%');
            }
        });
    }

    $contenus = $query->orderBy('created_at', 'desc')->paginate(10);
    $types = TypeContenu::all();

    return view('auteur.contenu.index', compact('contenus', 'types', 'typeFiltre'));
}

    /**
     * Afficher le formulaire de création de contenu
     */
    public function create()
    {
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();

        return view('auteur.contenu.create', compact('types', 'regions', 'langues'));
    }

    /**
     * Stocker un nouveau contenu
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'id_type' => 'required|exists:typecontenu,id',
            'id_region' => 'required|exists:région,id',
            'id_langue' => 'required|exists:langue,id',
            'resume' => 'nullable|string|max:500',
        ]);

        $auteur = Auth::guard('auteur')->user();

        Contenu::create([
            'titre' => $request->titre,
            'texte' => $request->texte,
            'id_type' => $request->id_type,
            'id_region' => $request->id_region,
            'id_langue' => $request->id_langue,
            'id_auteur' => $auteur->id,
            'statut' => 'en attente',
            'date_validation' => null,
            'parent_id' => null,
            'id_moderateur' => null,
        ]);

        return redirect()->route('auteur.contenu.index')
                         ->with('success', 'Votre contenu a été soumis avec succès ! Il sera publié après validation.');
    }

    /**
     * Afficher un contenu spécifique
     */
    public function show($id)
    {
        $auteur = Auth::guard('auteur')->user();
        $contenu = Contenu::where('id_auteur', $auteur->id)
                         ->with(['type', 'region', 'langue', 'media'])
                         ->findOrFail($id);

        return view('auteur.contenu.show', compact('contenu'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $auteur = Auth::guard('auteur')->user();
        $contenu = Contenu::where('id_auteur', $auteur->id)->findOrFail($id);
        
        // Vérifier si le contenu peut être édité (seulement si en attente)
        if ($contenu->statut !== 'en attente') {
            return redirect()->route('auteur.contenu.index')
                             ->with('error', 'Seuls les contenus en attente de validation peuvent être modifiés.');
        }

        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();

        return view('auteur.contenu.edit', compact('contenu', 'types', 'regions', 'langues'));
    }

    /**
     * Mettre à jour un contenu
     */
    public function update(Request $request, $id)
    {
        $auteur = Auth::guard('auteur')->user();
        $contenu = Contenu::where('id_auteur', $auteur->id)->findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'id_type' => 'required|exists:typecontenu,id',
            'id_region' => 'required|exists:région,id',
            'id_langue' => 'required|exists:langue,id',
            'resume' => 'nullable|string|max:500',
        ]);

        $contenu->update([
            'titre' => $request->titre,
            'texte' => $request->texte,
            'id_type' => $request->id_type,
            'id_region' => $request->id_region,
            'id_langue' => $request->id_langue,
            'statut' => 'en attente', // Remettre en attente après modification
        ]);

        return redirect()->route('auteur.contenu.index')
                         ->with('success', 'Contenu modifié avec succès ! Il sera à nouveau soumis à validation.');
    }

    /**
     * Supprimer un contenu
     */
    public function destroy($id)
    {
        $auteur = Auth::guard('auteur')->user();
        $contenu = Contenu::where('id_auteur', $auteur->id)->findOrFail($id);

        // Vérifier si le contenu peut être supprimé
        if ($contenu->statut !== 'en attente') {
            return redirect()->route('auteur.contenu.index')
                             ->with('error', 'Seuls les contenus en attente de validation peuvent être supprimés.');
        }

        $contenu->delete();

        return redirect()->route('auteur.contenu.index')
                         ->with('success', 'Contenu supprimé avec succès.');
    }
}