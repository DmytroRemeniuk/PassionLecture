<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apprecier extends Model
{
    //Renomme la table
    protected $table = 'apprecier';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;
}
