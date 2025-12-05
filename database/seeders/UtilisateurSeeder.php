<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Utilisateur::create([
            'nom' => 'Nana',
            'prenom' => 'Madi',
            'email' => 'madi.nana@example.com',
            'mot_de_passe' => 'password123',
            'id_role' => 1, 
            'sexe' => 'F',
            'id_langue' => 1,
            'date_naissance' => '2004-05-20',
            'date_inscription' => now(),
            'statut' => 'valide',
            'photo' => 'default-user.png'
        ]);

        // Tu peux ajouter d'autres utilisateurs ici
        Utilisateur::create([
            'nom' => 'Jeff',
            'prenom' => 'Michee',
            'email' => 'jeff.mich@gmail.com',
            'mot_de_passe' => 'secret123',
            'id_role' => 2,
            'sexe' => 'M',
            'id_langue' => 2,
            'date_naissance' => '1995-08-15',
            'date_inscription' => now(),
            'statut' => 'valide',
            'photo' => 'default-user.png'
        ]);
        //
    }
}
