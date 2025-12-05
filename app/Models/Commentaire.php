<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
     protected $table = 'commentaire'; // nom de la table

    protected $primaryKey = 'id'; // clé primaire

    // Champs que l'on peut remplir en masse
    protected $fillable = [
        'texte',
        'note',
        'date',
        'id_utilisateur',
        'id_contenu',
       
        
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }
}
