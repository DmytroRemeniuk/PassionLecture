<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //Renomme la table
    protected $table = 't_categorie';

    public function Ouvrage()
    {
        return $this->hasMany(Ouvrage::class, 'categorie_fk');
    }

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;
}
