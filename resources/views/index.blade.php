<?php
    //include("Database.php");

    session_start();

    //$db = Database::getInstance();
    //$books = $db->getAllBooks();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Accueil</title>
    <link rel="stylesheet" href="../css/lecturepassion.css">
</head>
<body>
    <header>
        @include('header')
    </header>
    <div id="main">
        <h2>Utilité du site</h2>
        <p>Ce site est conçu pour permettre aux passionnés de lecture de découvrir, partager et discuter des ouvrages récents ou classiques.</p>
        <h2>Cinq derniers ouvrages</h2>
        <?php
        foreach ($books as $book) {
            $author = $db->getAuthor($book['auteur_id']);
        ?>
            <div id="books">
                <img id="book-format" src="<?= htmlspecialchars($book['Image']); ?>" alt="Couverture du livre <?= htmlspecialchars($book['Titre']); ?>">
                <div>
                    <strong><?= htmlspecialchars($book['Titre']); ?></strong><br>
                    <?= htmlspecialchars($author['Prenom'] . ' ' . $author['Nom']); ?>
                </div>
            </div>
        <?php } ?>

    </div>
    <footer>
       @include('footer')
    </footer>
</body>
</html>

