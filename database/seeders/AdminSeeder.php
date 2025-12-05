<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use PragmaRX\Google2FA\Google2FA;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
         $google2fa = new Google2FA();

        
         Utilisateur::create([
            'nom' => 'Admin',
            'prenom' => 'Maurice',
            'email' => 'maurice.comlan@uac.bj',
            'mot_de_passe' => 'Eneam123',
            'id_role' => 3, 
            'sexe' => 'M',
            'id_langue' => 1,
            'date_naissance' => '2004-05-20',
            'date_inscription' => now(),
            'statut' => 'validé',
            'photo' => 'users.jpg',
            'google2fa_secret' => $google2fa->generateSecretKey(),
            'twofactor_enabled' => true,

        ]);
    }
}
