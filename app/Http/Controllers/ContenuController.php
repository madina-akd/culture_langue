<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Langue;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;

class ContenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contenus = Contenu::with(['langue','type','region','auteur','moderateur','parent'])->get();
        return view('contenu.Index', compact('contenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all();

        return view('contenu.create', compact('types','regions','langues','utilisateurs','contenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'id_type' => 'required|exists:typecontenu,id',
            'id_region' => 'required|exists:région,id',
            'id_langue' => 'required|exists:langue,id',
            'id_auteur' => 'required|exists:utilisateurs,id',
            'statut' => 'required|in:en attente,validé,rejeté',
            'date_validation' => 'nullable|date',
        ]);

        // Si la date de validation n'est pas fournie et que le statut est "validé", utiliser la date actuelle
        $dateValidation = $request->date_validation;
        if (!$dateValidation && $request->statut === 'validé') {
            $dateValidation = now();
        }

        Contenu::create([
            'titre' => $request->titre,
            'texte' => $request->texte, // Le HTML est conservé
            'parent_id' => $request->parent_id,
            'id_type' => $request->id_type,
            'id_region' => $request->id_region,
            'id_langue' => $request->id_langue,
            'id_auteur' => $request->id_auteur,
            'id_moderateur' => Auth::id(), // L'admin connecté devient le modérateur
            'statut' => $request->statut,
            'date_validation' => $dateValidation,
        ]);

        return redirect()->route('contenu.create')
                         ->with('success', 'Contenu créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contenu $contenu)
    {
        return view('contenu.show', compact('contenu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contenu $contenu)
    {
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all();

        return view('contenu.edit', compact(
            'contenu', 'types', 'regions', 'langues', 'utilisateurs', 'contenus'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
   /**
 * Update the specified resource in storage.
 */
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Contenu $contenu)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'texte' => 'required|string',
        'id_type' => 'required|exists:typecontenu,id',
        'id_region' => 'required|exists:région,id',
        'id_langue' => 'required|exists:langue,id',
        'id_auteur' => 'required|exists:utilisateurs,id',
        'parent_id' => 'nullable|exists:contenu,id',
        'id_moderateur' => 'nullable|exists:utilisateurs,id',
        'statut' => 'required|in:en attente,validé,rejeté',
        'date_validation' => 'nullable|date',
    ]);

    // Nettoyer le HTML pour la sécurité (optionnel mais recommandé)
    $texteNettoye = $request->texte;
    
    // Si vous voulez autoriser seulement certaines balises HTML :
    // $texteNettoye = strip_tags($request->texte, '<p><strong><em><ul><ol><li><blockquote><h1><h2><h3><br>');

    // Gestion de la date de validation
    $dateValidation = $request->date_validation;
    if (!$dateValidation && in_array($request->statut, ['validé', 'rejeté']) && !in_array($contenu->statut, ['validé', 'rejeté'])) {
        $dateValidation = now();
    }

    // Si le statut revient à "en attente", réinitialiser la date de validation
    if ($request->statut === 'en attente') {
        $dateValidation = null;
        $idModerateur = null;
    } else {
        $idModerateur = $request->id_moderateur;
    }

    $contenu->update([
        'titre' => $request->titre,
        'texte' => $texteNettoye, // HTML conservé
        'id_type' => $request->id_type,
        'id_region' => $request->id_region,
        'id_langue' => $request->id_langue,
        'id_auteur' => $request->id_auteur,
        'parent_id' => $request->parent_id,
        'id_moderateur' => $idModerateur,
        'statut' => $request->statut,
        'date_validation' => $dateValidation,
    ]);

    return redirect()->route('contenu.index')
                    ->with('success', 'Contenu mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contenu $contenu)
    {
        $contenu->delete();

        return redirect()->route('contenu.index')
                         ->with('success', 'Contenu supprimé avec succès.');
    }

    public function histoires()
    {
        $histoires = Contenu::with(['langue','type','region','auteur', 'media'])
                            ->whereHas('type', function($q) {
                                $q->whereIn('nom', ['conte', 'histoire', 'légende']);
                            })
                            ->where('statut', 'validé')
                            ->orderBy('date_validation', 'desc')
                            ->paginate(9);

        return view('lecteur.contenu', compact('histoires'));
    }
}
