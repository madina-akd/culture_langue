<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $types = [
            ['nom' => 'auteur'],
            ['nom' => 'modérateur'],
            ['nom' => 'admin'],
            ['nom' => 'traducteur'],
            ['nom' => 'utilisateur'],
        ];

        DB::table('roles')->insert($types);
        //
    }
}
