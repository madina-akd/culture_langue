<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class TypeContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $types = [
            ['nom' => 'Conte'],
            ['nom' => 'Histoire'],
            ['nom' => 'Danse'],
            ['nom' => 'Recettes'],
           
        ];

        DB::table('TypeContenu')->insert($types);
    
        //
    }
}
