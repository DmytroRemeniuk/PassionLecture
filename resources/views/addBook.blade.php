<?php
// Inclure la base de données
include("Database.php");

session_start();
$db = Database::getInstance();

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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="../css/lecturepassion.css">
</head>
<body>
    <header>
        <?php include("header.php") ?>
    </header>

    <div id="main">
        <h2>Ajouter un ouvrage</h2>

        <!-- Formulaire d'ajout -->
        <form action="add_book.php" method="POST">
            <div class="form-container">
                <!-- Section de gauche -->
                <div class="form-left">
                    <label for="title">Titre :</label>
                    <input type="text" name="title" id="title" required>

                    <label for="author_first_name">Prénom de l'auteur :</label>
                    <input type="text" name="author_first_name" id="author_first_name" required>

                    <label for="author_last_name">Nom de l'auteur :</label>
                    <input type="text" name="author_last_name" id="author_last_name" required>

                    <label for="category">Catégorie :</label>
                    <input type="text" name="category" id="category" required>

                    <label for="publisher">Éditeur :</label>
                    <input type="text" name="publisher" id="publisher">

                    <label for="excerpt_link">Extrait (lien vers le PDF) :</label>
                    <input type="url" name="excerpt_link" id="excerpt_link">

                    <label for="pages">Nombre de pages :</label>
                    <input type="number" name="pages" id="pages" required>

                    <label for="summary">Résumé :</label>
                    <textarea name="summary" id="summary" rows="4" required></textarea>
                </div>

                <!-- Section de droite (image de couverture) -->
                <div class="form-right">
                    <label for="image">Couverture :</label>
                    <input type="text" name="image" id="image" placeholder="Ajouter une image" required>

                    <button type="submit">Ajouter l'ouvrage</button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <?php include("footer.php") ?>
    </footer>
</body>
</html>
