<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    //Renomme la table
    protected $table = 't_utilisateur';
    protected $primaryKey = 'utilisateur_id';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    public function Ouvrages(){
        return $this->hasMany(Ouvrage::class, 'utilisateur_fk');
    }
}
