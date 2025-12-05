<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'reference',
        'contenu_id',
        'type_contenu',
        'montant',
        'statut',
        'email_lecteur',
        'transaction_id',
        'donnees_paiement'
    ];

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }
}