<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
      protected $table = 'media'; // nom de la table

    protected $primaryKey = 'id'; // clé primaire

    // Champs que l'on peut remplir en masse
    protected $fillable = [
        'chemin',
        'description',
        'id_typemedia',
        'id_contenu',
       
        
    ];

    public function typemedia()
    {
        return $this->belongsTo(TypeMedia::class, 'id_typemedia');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }
}
