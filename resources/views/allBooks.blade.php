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
        </div>

        <h2>Tous les ouvrages</h2>

        <div id="books-list">
        @foreach($ouvrages as $ouvrage)
        <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id]) }}" id="books-link">
            <div class="book-item">
                <div class="book-image" style="background-image: url('{{ asset('img/' . $ouvrage->image) }}');">
                </div>
                <div class="book-details">
                    <h3>{{ $ouvrage->titre }}</h3>
                    <p><strong>Auteur :</strong> {{ $ouvrage->auteur ? $ouvrage->auteur->prenom . ' ' . $ouvrage->auteur->name : 'Auteur inconnu' }}</p>
                    <p><strong>Pseudo :</strong> {{ $ouvrage->utilisateur ? $ouvrage->utilisateur->pseudo : 'Pseudo non défini' }}</p>
                </div>
            </div>
        </a>
        <hr>
        @endforeach
        </div>

        <div class="pagination">
            {{ $ouvrages->links('pagination::bootstrap-4') }}
        </div>
        <div class="pagination-info">
            <p>Page {{ $ouvrages->currentPage() }} / {{ $ouvrages->lastPage() }}</p>
        </div>
    </div>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
