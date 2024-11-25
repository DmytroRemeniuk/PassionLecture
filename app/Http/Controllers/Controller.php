<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function addBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $author_first_name = htmlspecialchars($_POST['author_first_name']);
            $author_last_name = htmlspecialchars($_POST['author_last_name']);
            $category = htmlspecialchars($_POST['category']);
            $publisher = htmlspecialchars($_POST['publisher']);
            $excerpt_link = htmlspecialchars($_POST['excerpt_link']);
            $image = $_POST['image'];
            $pages = intval($_POST['pages']);
            $summary = htmlspecialchars($_POST['summary']);

            // Vérifier si l'auteur existe déjà
            $author_id = $db->getAuthorId($author_first_name, $author_last_name);

            // Si l'auteur n'existe pas, l'ajouter
            if ($author_id === null) {
                $author_id = $db->addAuthor($author_first_name, $author_last_name);
            }

            // Si toutes les données sont valides, ajouter le livre
            if (!empty($title) && !empty($author_id) && !empty($image) && !empty($category)) {
                $db->addBook($title, $author_id, $category, $publisher, $excerpt_link, $image, $pages, $summary);
                echo "Le livre a été ajouté avec succès !";
            } else {
                echo "Veuillez remplir tous les champs obligatoires.";
            }
        }
    }
}
