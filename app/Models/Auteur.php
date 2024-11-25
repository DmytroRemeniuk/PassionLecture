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
        // Requête pour récupérer l'utilisateur par nom d'utilisateur
        $query = "SELECT * FROM t_auteur WHERE auteur_id = :id";

        $binds = [':id' => $id];

        // Préparer et exécuter la requête avec l'identifiant de l'enseignant
        $req = $this->queryPrepareExecute($query, $binds);

        // Récupérer l'utilisateur
        $author = $this->formatData($req)[0];

        // Libérer les ressources
        $this->unsetData($req);

        // Retourner l'utilisateur ou null s'il n'existe pas
        return $author ? $author : null;
    }

}
