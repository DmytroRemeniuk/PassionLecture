<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function addBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Vérifier si l'auteur existe déjà
            //$author_id = $db->getAuthorId($author_first_name, $author_last_name);

            // Si l'auteur n'existe pas, l'ajouter
            if ($author_id === null) {
                //$author_id = $db->addAuthor($author_first_name, $author_last_name);
            }

            // Si toutes les données sont valides, ajouter le livre
            if (!empty($title) && !empty($author_id) && !empty($image) && !empty($category)) {
                //$db->addBook($_POST);
                echo "Le livre a été ajouté avec succès !";
            } else {
                echo "Veuillez remplir tous les champs obligatoires.";
            }
        }
    }
}
