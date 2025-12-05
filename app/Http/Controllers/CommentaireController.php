<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Utilisateur;
use App\Models\Contenu;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaires = Commentaire::with(['utilisateur','contenu'])->get();
        return view('commentaire.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $commentaires = Commentaire::all();
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all(); // pour choisir un parent si traduction

        return view('commentaire.create', compact('utilisateurs','contenus','commentaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Commentaire::create($request->all());

        return redirect()->route('commentaire.index')
                         ->with('success','Commentaire créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
         return view('commentaire.show', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Commentaire $commentaire)
   {
    $utilisateurs = Utilisateur::all();
    $contenus = Contenu::all();

    return view('commentaire.edit', compact('commentaire','utilisateurs','contenus'));
   }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
         $commentaire->update([
               
                'texte' => $request->texte,
                'note'=> $request->note,
                
                'id_utilisateur'=> $request->id_utilisateur,
                'id_contenu'=> $request->id_contenu,
                
            ]);

            return redirect()->route('commentaire.index')
                            ->with('success', 'Commentaire mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('commentaire.index')
                         ->with('success','Commentaire supprimé avec succès.');
    }
}
