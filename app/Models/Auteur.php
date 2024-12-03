<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    //Renomme la table
    protected $table = 't_auteur';
    protected $primaryKey = 'auteur_id';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    public function Ouvrages(){
        return $this->hasMany(Ouvrage::class, 'auteur_fk');
    }
}
