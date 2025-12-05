<?php

namespace App\Http\Controllers\Auteur;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\TypeMedia;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuteurMediaController extends Controller
{
    /**
     * Afficher la liste des médias de l'auteur
     */
    public function index()
    {
        $auteur = Auth::guard('auteur')->user();
        
        // Récupérer les médias des contenus de l'auteur
        $medias = Media::whereHas('contenu', function($query) use ($auteur) {
            $query->where('id_auteur', $auteur->id);
        })->with(['typeMedia', 'contenu'])->orderBy('created_at', 'desc')->paginate(12);

        return view('auteur.media.index', compact('medias'));
    }

    /**
     * Afficher le formulaire de création de média
     */
    public function create()
    {
        $auteur = Auth::guard('auteur')->user();
        $typesMedia = TypeMedia::all();
        
        // Récupérer seulement les contenus de l'auteur
        $contenus = Contenu::where('id_auteur', $auteur->id)->get();

        return view('auteur.media.create', compact('typesMedia', 'contenus'));
    }

    /**
     * Stocker un nouveau média
     */
    public function store(Request $request)
    {
        $auteur = Auth::guard('auteur')->user();

        $request->validate([
            'chemin' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,mp3,wav,pdf,doc,docx|max:10240', // 10MB max
            'description' => 'required|string|max:500',
            'id_typemedia' => 'required|exists:typemedia,id',
            'id_contenu' => 'required|exists:contenu,id',
        ]);

        // Vérifier que le contenu appartient bien à l'auteur
        $contenu = Contenu::where('id', $request->id_contenu)
                         ->where('id_auteur', $auteur->id)
                         ->firstOrFail();

        // Upload du fichier
        if ($request->hasFile('chemin')) {
            $file = $request->file('chemin');
            $fileName = time() . '_' . $file->getClientOriginalName();
          
            $file->move(public_path('assets/images'), $fileName);


            // Créer le média
            Media::create([
                'chemin' => 'assets/images/' . $fileName,
                'description' => $request->description,
                'id_typemedia' => $request->id_typemedia,
                'id_contenu' => $request->id_contenu,
            ]);

            return redirect()->route('auteur.media.index')
                             ->with('success', 'Média ajouté avec succès !');
        }

        return back()->with('error', 'Erreur lors de l\'upload du fichier.');
    }
    
        // Nom unique
       

        // Sauvegarde en base
       
    /**
     * Afficher un média spécifique
     */
    public function show($id)
    {
        $auteur = Auth::guard('auteur')->user();
        
        $media = Media::whereHas('contenu', function($query) use ($auteur) {
            $query->where('id_auteur', $auteur->id);
        })->with(['typeMedia', 'contenu'])->findOrFail($id);

        return view('auteur.media.show', compact('media'));
    }

    /**
     * Supprimer un média
     */
    public function destroy($id)
    {
        $auteur = Auth::guard('auteur')->user();
        
        $media = Media::whereHas('contenu', function($query) use ($auteur) {
            $query->where('id_auteur', $auteur->id);
        })->findOrFail($id);

        // Supprimer le fichier physique
        if (Storage::disk('public')->exists($media->chemin)) {
            Storage::disk('public')->delete($media->chemin);
        }

        $media->delete();

        return redirect()->route('auteur.media.index')
                         ->with('success', 'Média supprimé avec succès.');
    }
}