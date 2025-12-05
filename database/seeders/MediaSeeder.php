<?php

namespace Database\Seeders;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Media::create([
                    'chemin' => 'uploads/media/benin-art1.jpg',
                    'description' => 'Photo d’un masque traditionnel béninois.',
                    'id_typemedia' => 1, // Image
                    'id_contenu' => 1,   // Contenu existant
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
            ]);
             Media::create([
                'chemin' => 'uploads/media/danse-benin.mp4',
                'description' => 'Vidéo d’une danse traditionnelle Gèlèdè.',
                'id_typemedia' => 2, // Vidéo
                'id_contenu' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             Media::create([
                'chemin' => 'uploads/media/langue-fon.mp3',
                'description' => 'Audio d’une présentation en langue Fon.',
                'id_typemedia' => 3, // Audio
                'id_contenu' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             Media::create([
                'chemin' => 'uploads/media/rituels.jpg',
                'description' => 'Image illustrant un rituel traditionnel.',
                'id_typemedia' => 1,
                'id_contenu' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
    }
}
