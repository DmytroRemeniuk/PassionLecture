<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprecier extends Model
{
    /** @use HasFactory<\Database\Factories\ApprecierFactory> */
    use HasFactory;

    //Renomme la table
    protected $table = 'apprecier';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    //Enlever la protection des champs
    protected $guarded = [];
}
