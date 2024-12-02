<?php
// Inclure le fichier de connexion à la base de données
include('Database.php');

// Vérifier si l'ID de l'ouvrage est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Créer une instance de la classe Database pour interroger la BD
    $db = Database::getInstance();

    // Récupérer les détails de l'ouvrage
    $bookDetails = $db->getOneBook($id);

    // Si l'ouvrage existe
    if ($bookDetails) {
        // Récupérer les informations
        $title = $bookDetails['titre'];
        $author = $bookDetails['auteur'];
        $category = $bookDetails['categorie'];
        $description = $bookDetails['description']; // Ajouter ce champ à votre table t_ouvrage si nécessaire
        $publishedYear = $bookDetails['annee_publication']; // Ajouter ce champ si nécessaire
        $coverImage = $bookDetails['image']; // Par exemple pour l'image de couverture, si disponible
    } //else {
        //echo "Ouvrage non trouvé.";
        //exit;
    //}
//} //else {
    //echo "ID de l'ouvrage manquant.";
    //exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'ouvrage - <?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="../CSS/lecturepassion.css">
</head>
<body>

    <header>
        <?php include('header.php'); ?>
    </header>
    <main>
        <section class="book-detail">
            <h1>Détails de l'ouvrage</h1>
            <div class="book-container">
                <div class="book-image">
                    <img src="images/<?= $coverImage; ?>" alt="Couverture de <?= htmlspecialchars($title); ?>" />
                </div>
                <div class="book-info">
                    <h2><?= htmlspecialchars($title); ?></h2>
                    <p><strong>Auteur:</strong> <?= htmlspecialchars($author); ?></p>
                    <p><strong>Catégorie:</strong> <?= htmlspecialchars($category); ?></p>
                    <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($description)); ?></p>
                    <p><strong>Année de publication:</strong> <?= htmlspecialchars($publishedYear); ?></p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
