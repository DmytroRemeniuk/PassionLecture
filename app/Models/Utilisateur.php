<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    /** @use HasFactory<\Database\Factories\UtilisateurFactory> */
    use HasFactory;

    //Renomme la table
    protected $table = 't_utilisateur';
    protected $primaryKey = 'utilisateur_id';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    protected $guarded = [];

    public function Ouvrages()
    {
        return $this->hasMany(Ouvrage::class, 'utilisateur_fk', 'utilisateur_id');
    }
}
