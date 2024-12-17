<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Tous les ouvrages</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('header')
    </header>

    <div id="main">
        <form action="{{ route('all-books') }}" method="GET">
            <!-- Barre de recherche -->
            <input type="text" name="searchbox" id="searchbox" placeholder="Recherche" value="{{ old('searchbox', $request->get('searchbox')) }}">

            <!-- Bouton de recherche -->
            <button type="submit">
                <img class="search" src="{{ asset('search.png') }}" alt="icone de recherche">
            </button>

            <!-- Sélecteur de catégorie -->
            <div id="filter">
                <label for="category-select">Catégorie :</label>
                <select id="category-select" name="category_id">
                    <option value="">Tous les ouvrages</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->categorie_id }}"
                        {{ request('category_id') == $category->categorie_id ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Filtres (Titre, Auteur, etc.) -->
            <div id="filter-options">
                <input type="radio" name="filter" id="title" class="filter" value="title"
                    {{ request('filter') == 'title' ? 'checked' : '' }}>
                <label for="title">Titre</label>

                <input type="radio" name="filter" id="author" class="filter" value="author"
                    {{ request('filter') == 'author' ? 'checked' : '' }}>
                <label for="author">Auteur</label>

                <input type="radio" name="filter" id="user" class="filter" value="user"
                    {{ request('filter') == 'user' ? 'checked' : '' }}>
                <label for="user">Utilisateur</label>

                <input type="radio" name="filter" id="editor" class="filter" value="editor"
                    {{ request('filter') == 'editor' ? 'checked' : '' }}>
                <label for="editor">Éditeur</label>

                <input type="radio" name="filter" id="year" class="filter" value="year"
                    {{ request('filter') == 'year' ? 'checked' : '' }}>
                <label for="year">Année</label>

                <input type="radio" name="filter" id="pages" class="filter" value="pages"
                    {{ request('filter') == 'pages' ? 'checked' : '' }}>
                <label for="pages">Nombre de pages</label>
            </div>
        </form>


        <h2>{{ $selectedCategory ? $selectedCategory->nom : 'Tous les ouvrages' }}</h2>

        <div id="books-list">
            @if($ouvrages->isEmpty())
            <p>Aucun ouvrage trouvé</p>
            @else
            @foreach($ouvrages as $ouvrage)
            <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id]) }}" id="books-link">
                <div class="book-item">
                    <div class="book-image"
                        style="background-image: url('{{ asset('img/' . ($ouvrage->image ?: 'default-image.jpg')) }}');">
                    </div>
                    <div class="book-details">
                        <h3>{{ $ouvrage->titre }}</h3>
                        <p><strong>Auteur :</strong> {{ $ouvrage->fkAuteur ? $ouvrage->fkAuteur->prenom . ' ' . $ouvrage->fkAuteur->nom : 'Auteur inconnu' }}</p>
                        <p><strong>Pseudo :</strong> {{ $ouvrage->fkUtilisateur ? $ouvrage->fkUtilisateur->name : 'Pseudo non défini' }}</p>
                    </div>
                </div>
            </a>
            <hr>
            @endforeach
            @endif
        </div>
    </div>

    @if($ouvrages->isEmpty())

    @else
    <div class="pagination">
        {{ $ouvrages->links('pagination::bootstrap-4') }}
    </div>
    <div class="pagination-info">
        <p>Page {{ $ouvrages->currentPage() }} / {{ $ouvrages->lastPage() }}</p>
    </div>
    @endif
    </div>
    <footer>
        @include('footer')
    </footer>
</body>

</html>