<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class ReController extends Controller
{
    public function index()
    {
        // Récupérer toutes les régions depuis la base de données
        $regions = Region::orderBy('nom_region', 'asc')->get();

        return view('lecteur.region', compact('regions'));
    }

    public function show($id)
    {
        $region = Region::findOrFail($id);
        
        // Récupérer les contenus associés à cette région
        $contenus = $region->contenu()
            ->where('statut', 'validé')
            ->with(['media', 'type', 'langue'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lecteur.regionshow', compact('region', 'contenus'));
    }
}