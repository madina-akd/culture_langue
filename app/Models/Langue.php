<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{ protected $table = 'langue'; // nom de la table
    protected $primaryKey = 'id'; // clé primaire
    public $timestamps = true;

    protected $fillable = [
        'nom_langue',  // nom de la langue
        'code_langue', // code de la langue
        'description', // description éventuelle
    ];

    // Relation : une langue peut être parlée par plusieurs utilisateurs
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id');
    }
     public function contenu()
    {
        return $this->hasMany(Contenu::class, 'id');
    }
    //
}
