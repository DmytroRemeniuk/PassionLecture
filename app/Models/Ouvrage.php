<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Ouvrage extends Model
{
    /** @use HasFactory<\Database\Factories\OuvrageFactory> */
    use HasFactory;

    //Nom de la table
    protected $table = 't_ouvrage';

    //Clé primaire de la table
    protected $primaryKey = 'ouvrage_id';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    //Récupère les 5 derniers livres de la base de données
    public static function getLastFiveBooks()
    {
        //Récupère les 5 derniers ouvrages de la DB
        //id => attribut à trier
        //desc => pour décroissant
        return self::orderBy('ouvrage_id', 'desc')->take(5)->get();
    }

    protected $guarded = [];

    public function fkUtilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_fk', 'utilisateur_id');
    }

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_fk', 'categorie_id');
    }

    public function fkAuteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_fk', 'auteur_id');
    }
}
