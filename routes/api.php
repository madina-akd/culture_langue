<?php

use Illuminate\Support\Facades\Route;
Route::get('/roles', function() {
    $roles = App\Models\Role::select('id', 'nom')->get();
    return response()->json($roles);
})->name('api.roles');

Route::get('/langues', function() {
    $langues = App\Models\Langue::select('id', 'nom_langue')->get();
    return response()->json($langues);
})->name('api.langues');