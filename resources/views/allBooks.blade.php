<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les ouvrages</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('header')
    </header>

    <div id="main">
        <div id="filter">
            <ul>
                <li><a href="{{ route('all-books') }}" class="{{ !request()->has('category_id') ? 'active' : 'filter' }}">Tous les ouvrages</a></li>
                @foreach($categories as $category)
                <li>
                    <a href="{{ route('all-books', ['category_id' => $category->categorie_id]) }}"
                        class="{{ request('category_id') == $category->categorie_id ? 'active' : 'filter' }}">
                        {{ $category->nom }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <h2>{{ $selectedCategory ? $selectedCategory->nom : 'Tous les ouvrages' }}</h2>


        <div id="books-list">
            @if($ouvrages->isEmpty())
            <p>Aucun ouvrage dans cette catégorie</p>
            @else
            @foreach($ouvrages as $ouvrage)
            <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id]) }}" id="books-link">
                <div class="book-item">
                    <div class="book-image" style="background-image: url('{{ asset('img/' . $ouvrage->image) }}');">
                    </div>
                    <div class="book-details">
                        <h3>{{ $ouvrage->titre }}</h3>
                        <p><strong>Auteur :</strong> {{ $ouvrage->fkAuteur ? $ouvrage->fkAuteur->prenom . ' ' . $ouvrage->fkAuteur->nom : 'Auteur inconnu' }}</p>
                        <p><strong>Pseudo :</strong> {{ $ouvrage->fkUtilisateur ? $ouvrage->fkUtilisateur->pseudo : 'Pseudo non défini' }}</p>
                    </div>
                    <div class="MD">
                        <a href="">Modifier</a>
                        <a href=""> | Supprimer</a>
                    </div>
                </div>
            </a>
            <hr>
            @endforeach
            @endif
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