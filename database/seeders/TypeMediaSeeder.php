<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class TypeMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
         $types = [
            ['nom' => 'Vidéo','prix' => 4000],
            ['nom' => 'Audio','prix' => 2000],
            ['nom' => 'Image','prix' => 1000],
           
           
        ];

        DB::table('TypeMedia')->insert($types);
    
        //
    }
}
