<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
     protected $table = 'contenu'; // nom de la table

    protected $primaryKey = 'id'; // clé primaire

    // Champs que l'on peut remplir en masse
    protected $fillable = [
        'titre',
        'texte',
        'parent_id',
        'id_type',
        'id_region',
        'id_langue',
        'id_auteur',
        'id_moderateur',
        'date_validation',
        'statut',
        
    ];

    public function type()
    {
        return $this->belongsTo(TypeContenu::class, 'id_type');
    }

    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_auteur');
    }
    public function moderateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_moderateur');
    }
     public function region()
    {
        return $this->belongsTo(Region::class, 'id_region');
    }
      public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }
     public function parent()
    {
        return $this->belongsTo(Contenu::class, 'parent_id');
    }

     public function media()
    {
        return $this->hasMany(Media::class, 'id_contenu');
    }
     public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_contenu');
    }
    public function traduction()
    {
        return $this->hasMany(Contenu::class, 'id');
    }

    protected $casts = [
        'date_validation' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Dans app/Models/Contenu.php
    public function getReadingTimeAttribute()
    {
        $wordsPerMinute = 200;
        $words = str_word_count(strip_tags($this->texte));
        return ceil($words / $wordsPerMinute);
    }
        
}
