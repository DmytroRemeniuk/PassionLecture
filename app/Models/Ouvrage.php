<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    //Renomme la table
    protected $table = 't_ouvrage';
    
    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 't_auteur');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_fk');
    }

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;
}
