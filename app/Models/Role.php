<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // nom de la table
    protected $primaryKey = 'id'; // clé primaire si différente de 'id'
    public $timestamps = true; // si tu utilises created_at et updated_at

    protected $fillable = [
        'nom', // nom du rôle
    ];

    // Relation : un rôle a plusieurs utilisateurs
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id');
    }
    //
}
