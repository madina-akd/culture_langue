<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs'; // nom de la table
    protected $primaryKey = 'id';      // clé primaire

    // Champs remplissables
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'id_role',
        'sexe',
        'id_langue',
        'date_naissance',
        'date_inscription',
        'statut',
        'photo',
        'google2fa_secret',
        'twofactor_enabled',

    ];

    // Masquer certains champs
    protected $hidden = [
        'mot_de_passe',
        'remember_token',
        'google2fa_secret',

    ];

    protected $casts = [
        'date_naissance'   => 'date',
        'date_inscription' => 'date',
    ];

    /**
     * ⚠️ Indiquer à Laravel que la colonne du mot de passe est "mot_de_passe"
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    /** Relations */
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function contenu()
    {
        return $this->hasMany(Contenu::class, 'id');
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class, 'id');
    }

    /** Mutator pour hasher automatiquement le mot de passe */
    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }
     public function scopeAuteur(Builder $query)
    {
        return $query->where('id_role', 1);
    }
     public function isAuteur()
    {
        return $this->id_role === 1;
    }
    public function isManager()
    {
        return $this->id_role === 6; // ID du rôle modérateur
    }
}
