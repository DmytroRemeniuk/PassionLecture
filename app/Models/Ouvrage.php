<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    /** @use HasFactory<\Database\Factories\OuvrageFactory> */
    use HasFactory;

    //Renomme la table
    protected $table = 't_ouvrage';

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur');
    }

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;


    //Récupère les 5 derniers livres de la base de données
    public static function getLastFiveBooks(){

        //Récupère les 5 derniers ouvrages de la DB
        //id => attribut à trier
        //desc => pour décroissant
        return self::orderBy('ouvrage_id', 'desc')->take(5)->get();
    }

    protected $guarded = [];
}
