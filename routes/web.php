<?php
/* appeler les routes qui sont dans ces deux fichier là car c'est seulemnent ici que les routes sont exécutées */
require __DIR__.'/front.php';
require __DIR__.'/admin.php';
require __DIR__.'/api.php';


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/rename-table', function () {
    try {
        // Ancien nom de la table
        $oldName = 'TypeContenu';
        // Nouveau nom de la table
        $newName = 'typecontenu';

        // Renommer la table
        DB::statement("RENAME TABLE `$oldName` TO `$newName`");

        return "La table '$oldName' a été renommée en '$newName'.";
    } catch (\Exception $e) {
        return "Erreur : " . $e->getMessage();
    }
});
