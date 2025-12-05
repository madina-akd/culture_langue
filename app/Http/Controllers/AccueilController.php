<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Contenu;
use App\Models\Media;
use App\Models\Region;

class AccueilController extends Controller
{
    public function index()
    {
        // Exemples de données dynamiques
        $langues = Langue::all(); // toutes les langues
        $contenus = Contenu::with('type')->latest()->take(3)->get(); // derniers contenus
        $medias = Media::with('typemedia')->take(5)->get(); // quelques médias
        $regions = Region::all(); // régions du Bénin

        return view('lecteur.index', compact('langues', 'contenus', 'medias', 'regions'));
    }
}
