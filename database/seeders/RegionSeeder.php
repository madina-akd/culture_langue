<?php

namespace Database\Seeders;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           Region::create([
            
                'nom_region' => 'Atlantique',
                'description' => 'Région côtière avec Cotonou comme ville principale.',
                'population' => 1750000,
                'superficie' => 329.0,
                'localisation' => 'Sud du Bénin, bord Atlantique'
           ]);
            Region::create([
                'nom_region' => 'Borgou',
                'description' => 'Région du nord-est, connue pour sa diversité ethnique.',
                'population' => 1234567,
                'superficie' => 25100.5,
                'localisation' => 'Nord-est du Bénin'
            ]);
            Region::create([
                'nom_region' => 'Ouémé',
                'description' => 'Région avec Porto-Novo comme capitale.',
                'population' => 1180000,
                'superficie' => 1960.0,
                'localisation' => 'Sud-est du Bénin'
            ]);
            Region::create([
                'nom_region' => 'Atacora',
                'description' => 'Région montagneuse au nord-ouest du Bénin.',
                'population' => 867000,
                'superficie' => 19800.0,
                'localisation' => 'Nord-ouest du Bénin'
            ]);
        
        //
    }
}
