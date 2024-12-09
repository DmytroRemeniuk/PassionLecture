<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    /** @use HasFactory<\Database\Factories\AuteurFactory> */
    use HasFactory;

    //Renomme la table
    protected $table = 't_auteur';

    protected $primaryKey = 'auteur_id';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    protected $guarded = [];

    public function Ouvrages(){

        return $this->hasMany(Ouvrage::class, 'auteur_fk');
    }
}
