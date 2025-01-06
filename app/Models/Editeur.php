<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    /** @use HasFactory<\Database\Factories\EditeurFactory> */
    use HasFactory;

    //Renomme la table
    protected $table = 't_editeur';

    protected $primaryKey = 'editeur_id';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    //Enlever la protection des champs
    protected $guarded = [];
}
