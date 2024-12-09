<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    @include('header')
</header>

<div id="main">
    <h2>Ajouter un ouvrage</h2>

    <!-- Formulaire d'ajout -->
    <form action="/addBook" method="POST">
        @csrf
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

                <label for="year">Année :</label>
                <input type="number" name="year" id="year" required>

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
    @include('footer')
</footer>
</body>
</html>
