<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Modifier un livre</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('header')
    </header>

    <div id="main">
        <h2>Modifier un ouvrage</h2>

        <!-- Formulaire d'ajout -->
        <form action="/books/edit/{{$ouvrage->ouvrage_id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <!-- Section de gauche -->
                <div class="form-left">
                    <label for="title">Titre :</label>
                    <input type="text" name="title" id="title" value="{{$ouvrage->titre}}" required>

                    <label for="author_first_name">Prénom de l'auteur :</label>
                    <input type="text" name="author_first_name" id="author_first_name" value="{{$ouvrage->fkAuteur->prenom}}" required>

                    <label for="author_last_name">Nom de l'auteur :</label>
                    <input type="text" name="author_last_name" id="author_last_name" value="{{$ouvrage->fkAuteur->nom}}" required>

                    <label for="category">Catégorie :</label>
                    <select name="category" id="category">
                        <option value="">Catégorie</option>
                        @foreach($categories as $category)
                        <option value="{{$category->categorie_id}}"
                            @if ($category->categorie_id == $ouvrage->fkCategorie->categorie_id)
                            selected
                            @endif
                            >{{$category->nom}}</option>;
                        @endforeach
                    </select>
                    <label for="publisher">Éditeur :</label>
                    <input type="text" name="publisher" id="publisher" value="{{$ouvrage->fkEditeur->nom}}">

                    <label for="excerpt_link">Extrait (lien vers le PDF) :</label>
                    <input type="url" name="excerpt_link" id="excerpt_link" value="{{$ouvrage->extrait}}">

                    <label for="pages">Nombre de pages :</label>
                    <input type="number" name="pages" id="pages" value="{{$ouvrage->nbPages}}" required>

                    <label for="year">Année :</label>
                    <input type="number" name="year" id="year" value="{{$ouvrage->annee}}" required>

                    <label for="summary">Résumé :</label>
                    <textarea name="summary" id="summary" rows="4" required>{{$ouvrage->resume}}</textarea>
                </div>

                <!-- Section de droite (image de couverture) -->
                <div class="form-right">
                    <label for="image">Couverture :</label>
                    <input type="file" name="image" id="image" accept="image/*">

                    <button type="submit">Modifier l'ouvrage</button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>

</html>