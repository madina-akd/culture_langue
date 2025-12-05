<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Utilisateur;
use App\Models\Langue;
use App\Models\Region;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Données statistiques de base
            $data = [
                'totalContenus' => Contenu::count(),
                'totalUtilisateurs' => Utilisateur::count(),
                'totalLangues' => Langue::count(),
                'totalRegions' => Region::count(),
            ];

            // Contenus par région avec gestion des erreurs
            $contentsByRegion = Region::select('id', 'nom_region')
                ->withCount(['contenu as contenus_count' => function($query) {
                    $query->where('statut', 'validé'); // Seulement les contenus validés
                }])
                ->get()
                ->map(function($region) {
                    return [
                        'nom' => $region->nom_region,
                        'contenus_count' => $region->contenus_count
                    ];
                });

            // Utilisateurs par rôle
            $usersByRole = Role::select('id', 'nom')
                ->withCount('utilisateurs')
                ->get()
                ->map(function($role) {
                    return [
                        'nom' => $role->nom,
                        'utilisateurs_count' => $role->utilisateurs_count
                    ];
                });

            // Évolution des utilisateurs par mois (pour le line chart)
            $usersEvolution = Utilisateur::select(
                    DB::raw('YEAR(date_inscription) as year'),
                    DB::raw('MONTH(date_inscription) as month'),
                    DB::raw('COUNT(*) as count')
                )
                ->where('date_inscription', '>=', now()->subYear())
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get()
                ->map(function($item) {
                    return [
                        'month' => $item->month . '/' . $item->year,
                        'count' => $item->count
                    ];
                });

            return view('welcomeadmin', array_merge($data, [
                'contentsByRegion' => $contentsByRegion,
                'usersByRole' => $usersByRole,
                'usersEvolution' => $usersEvolution
            ]));

        } catch (\Exception $e) {
            // En cas d'erreur, retourner des données par défaut
            return view('welcomeadmin', [
                'totalContenus' => 0,
                'totalUtilisateurs' => 0,
                'totalLangues' => 0,
                'totalRegions' => 0,
                'contentsByRegion' => collect([]),
                'usersByRole' => collect([]),
                'usersEvolution' => collect([])
            ]);
        }
    }
}