<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    //Renomme la table
    protected $table = 't_utilisateur';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;
}
