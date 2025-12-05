<?php

namespace Database\Seeders;

use App\Models\Contenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Contenu::create([
                'titre' => 'Introduction au Vodoun',
                'texte' => 'Le Vodoun est une religion traditionnelle béninoise, pratiquée depuis des siècles...',
                'parent_id' => null,
                'id_type' => 1,       // Assurez-vous que TypeContenu id=1 existe
                'id_region' => 1,     // Région Sud par exemple
                'id_langue' => 1,     // Langue Fon par exemple
                'id_auteur' => 1,     // Utilisateur existant
                'id_moderateur' => 2, // Utilisateur existant
                'date_validation' => Carbon::now(),
                'statut' => 'validé',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
         ]);
            Contenu::create([
                'titre' => 'Les danses traditionnelles',
                'texte' => 'Le Bénin possède une grande diversité de danses, selon les régions et les ethnies...',
                'parent_id' => null,
                'id_type' => 2,
                'id_region' => 2,
                'id_langue' => 2,
                'id_auteur' => 2,
                'id_moderateur' => 1,
                'date_validation' => Carbon::now(),
                'statut' => 'en attente',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            Contenu::create([
                'titre' => 'Masques et rituels',
                'texte' => 'Les masques béninois sont utilisés lors des cérémonies pour représenter les esprits...',
                'parent_id' => null,
                'id_type' => 3,
                'id_region' => 3,
                'id_langue' => 3,
                'id_auteur' => 1,
                'id_moderateur' => 2,
                'date_validation' => Carbon::now(),
                'statut' => 'validé',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
