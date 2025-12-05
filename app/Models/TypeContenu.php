<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContenu extends Model
{
    protected $table = 'typecontenu'; // nom de la table
    protected $primaryKey = 'id';     // clé primaire
    public $timestamps = true;        // created_at et updated_at

    protected $fillable = [
        'nom',
    ];

    // Relation : un typecontenu a plusieurs contenus
    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'id_type', 'id');
    }
}
