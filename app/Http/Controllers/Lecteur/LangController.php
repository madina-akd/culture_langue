<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Langue;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function index()
    {
        // Récupérer toutes les langues depuis la base de données
        $langues = Langue::orderBy('nom_langue', 'asc')->get();

        return view('lecteur.langues', compact('langues'));
    }

    public function show($id)
    {
        $langue = Langue::findOrFail($id);
        
        // Récupérer les contenus dans cette langue
        $contenus = $langue->contenu()
            ->where('statut', 'validé')
            ->with(['media', 'type'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lecteur.languesdetail', compact('langue', 'contenus'));
    }
}