<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    //Renomme la table
    protected $table = 't_editeur';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;
}
