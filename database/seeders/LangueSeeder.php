<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Langue;
class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Langue::create([
            
                'nom_langue' => 'Fon',
                'code_langue' => 'fon',
                'description' => 'Le Fon est parlé principalement dans le sud du Bénin, notamment à Abomey et Cotonou.'
            ]);
            Langue::create([
                'nom_langue' => 'Yoruba',
                'code_langue' => 'yor',
                'description' => 'Le Yoruba est utilisé dans le sud-ouest du Bénin et partage des racines avec le Nigeria.'
            ]);
            Langue::create([
                'nom_langue' => 'Dendi',
                'code_langue' => 'den',
                'description' => 'Le Dendi est parlé dans la région de Borgou et à proximité du Niger.'
            ]);
            Langue::create([
                'nom_langue' => 'Bariba',
                'code_langue' => 'bba',
                'description' => 'Langue du nord-est, notamment dans le département de Borgou et Alibori.'
            ]);
            Langue::create([
                'nom_langue' => 'Adja',
                'code_langue' => 'adj',
                'description' => 'Parlée principalement dans le sud-ouest, proche du littoral béninois.'
            ]);
        
    
        //
    }
}
