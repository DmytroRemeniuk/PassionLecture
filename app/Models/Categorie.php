<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;

    //Renomme la table
    protected $table = 't_categorie';

    protected $primaryKey = 'categorie_id';

    public function Ouvrage()
    {
        return $this->hasMany(Ouvrage::class, 'categorie_fk');
    }

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;

    public function Ouvrages(){
        return $this->hasMany(Ouvrage::class, 'categorie_fk');
    }
}
