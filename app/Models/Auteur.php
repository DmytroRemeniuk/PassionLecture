<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    //Renomme la table
    protected $table = 't_auteur';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    public function getAuthor($id){
        return DB::table('t_auteur')->whereRaw("auteur_id = $id");
    }

}
