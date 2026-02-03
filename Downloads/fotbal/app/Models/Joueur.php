<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = [
        'nom_prenom','age','poste',
        'nombre_but','carte_jaune',
        'carte_rouge','equipe_id'
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
