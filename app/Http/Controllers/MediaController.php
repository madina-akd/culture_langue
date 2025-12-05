<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\TypeMedia;

use App\Models\Contenu;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::with(['typemedia','contenu'])->get();
        return view('media.index', compact('medias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typemedias = TypeMedia::all();
        $contenus = Contenu::all();
        return view('media.create', compact('typemedias','contenus'));

    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
   {
    $request->validate([
        'chemin' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,avi,webp|max:20480',
        'description' => 'nullable|string',
        'id_typemedia' => 'required|integer',
        'id_contenu' => 'required|integer',
    ]);

    if ($request->hasFile('chemin')) {
        $file = $request->file('chemin');

        // Nom unique
        $filename = time() . '_' . $file->getClientOriginalName();

        // Stockage dans public/assets/images
        $file->move(public_path('assets/images'), $filename);

        // Sauvegarde en base
        Media::create([
            'chemin' => 'assets/images/' . $filename,
            'description' => $request->description,
            'id_typemedia' => $request->id_typemedia,
            'id_contenu' => $request->id_contenu,
        ]);
    }

    return redirect()->route('media.create')
                     ->with('success', 'Media créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
         return view('media.show', compact('media'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
         $typemedias = TypeMedia::all();
        $contenus = Contenu::all();
        return view('media.edit', compact('media','typemedias','contenus'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
   {
    $request->validate([
        'chemin' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,avi,webp|max:20480',
        'description' => 'nullable|string',
        'id_typemedia' => 'required|integer',
        'id_contenu' => 'required|integer',
    ]);

    $data = [
        'description' => $request->description,
        'id_typemedia' => $request->id_typemedia,
        'id_contenu' => $request->id_contenu,
    ];

    // Si un nouveau fichier est envoyé
    if ($request->hasFile('chemin')) {
        $file = $request->file('chemin');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Nouveau fichier
        $file->move(public_path('assets/images'), $filename);

        // Supprimer l'ancien fichier si existe
        if ($media->chemin && file_exists(public_path($media->chemin))) {
            unlink(public_path($media->chemin));
        }

        $data['chemin'] = 'assets/images/' . $filename;
    }

    // Mise à jour en base
    $media->update($data);

    return redirect()->route('media.index')
                     ->with('success', 'Media mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
         $media->delete();

        return redirect()->route('media.index')
                         ->with('success','Media supprimé avec succès.');
    }
}
