<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commentaire;
class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentaire::create([
             'texte' => 'Excellent article sur la culture béninoise, très instructif !',
                'note' => 5,
                'date' => Carbon::today(),
                'id_utilisateur' => 1, // doit exister
                'id_contenu' => 1,     // doit exister
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);
            Commentaire::create([
                'texte' => 'Très intéressant mais certaines informations manquent de précision.',
                'note' => 4,
                'date' => Carbon::today()->subDays(2),
                'id_utilisateur' => 2,
                'id_contenu' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            Commentaire::create([
                'texte' => 'Je n’ai pas trouvé les exemples assez clairs, à améliorer.',
                'note' => 3,
                'date' => Carbon::today()->subDays(5),
                'id_utilisateur' => 3,
                'id_contenu' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            Commentaire::create([
                'texte' => 'Contenu parfait, bien structuré et agréable à lire.',
                'note' => 5,
                'date' => Carbon::today()->subDays(1),
                'id_utilisateur' => 2,
                'id_contenu' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
