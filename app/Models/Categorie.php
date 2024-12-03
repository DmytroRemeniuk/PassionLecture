<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //Renomme la table
    protected $table = 't_categorie';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    public function Ouvrages(){
        return $this->hasMany(Ouvrage::class, 'categorie_fk');
    }
}
