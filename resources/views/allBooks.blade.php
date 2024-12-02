<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les ouvrages</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('header')
    </header>

    <div id="main">
        @foreach($categories as $categorie)
            <div class="categorie-section">
                <h2>{{ $categorie->nom }}</h2> <!-- Affiche le nom de la catégorie -->
                <ul>
                    @foreach($categorie->ouvrage as $ouvrage)
                        <li>
                            <a href="{{ route('livres.show', $ouvrage->ouvrage_id) }}">{{ $ouvrage->titre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <h2>Tous les ouvrages</h2>

        <div id="books-list">
            @foreach($ouvrages as $ouvrage)
                <div class="book-item">
                    <div class="book-image" style="background-image: url('{{ asset($ouvrage->image) }}');" alt="{{ $ouvrage->titre }}">
                    </div>
                    <div class="book-details">
                        <h3>{{ $ouvrage->titre }}</h3>
                        <p><strong>Auteur :</strong> </p>
                        <p><strong>Pseudo :</strong> </p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
