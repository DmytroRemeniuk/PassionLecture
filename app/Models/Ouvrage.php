<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    //Renomme la table
    protected $table = 't_ouvrage';

    //Désactive les champs par défault de date/Heure pour la modification et la création de la table
    public $timestamps = false;


    public function getAllBooks(){

        // Avoir la requète sql
        $query = "SELECT * FROM t_ouvrage;";

        // Appeler la méthode pour executer la requète
        $req = $this->querySimpleExecute($query);

        // Appeler la méthode pour avoir le résultat sous forme de tableau
        $books = $this->formatData($req);

        // Vider les ressources
        $this->unsetData($req);

        // Retour tous les enseignants
        return $books;
    }

    public function getOneBook($id) {

        // Requête SQL pour récupérer un enseignant en fonction de son id
        $query = "SELECT * FROM t_ouvrage WHERE ouvrage_id = :id";

        $binds = [':id' => $id];

        // Préparer et exécuter la requête avec l'identifiant de l'enseignant
        $req = $this->queryPrepareExecute($query, $binds);

        // Formater le résultat sous forme de tableau associatif
        $book = $this->formatData($req)[0];

        // Libérer les ressources
        $this->unsetData($req);

        // Retourner l'enseignant
        return $book;
    }
}
