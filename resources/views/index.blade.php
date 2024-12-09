<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        @include('header')
    </header>
    <div id="main">
        <h2>Utilité du site</h2>
        <p>Ce site est conçu pour permettre aux passionnés de lecture de découvrir, partager et discuter des ouvrages récents ou classiques.</p>
        <h2>Cinq derniers ouvrages</h2>
        @foreach($lastFiveBooks as $book)
        <li>
            <div id="books">
                <a href="{{ route('details', ['idBook' => $book->ouvrage_id]) }}">
                    <img id="book-format" src="{{ asset('img/' . $book->image)}}" alt="{{ asset('Couverture du livre' . ' ' . $book->titre)}}">
                </a>
                <div>
                    <strong>Titre: {{ $book->titre }}</strong><br>
                    Auteur: {{ $book->fkAuteur->prenom}} {{ $book->fkAuteur->nom}}<br>
                    Pseudo: {{ $book->fkUtilisateur->pseudo}}
                </div>
            </div>
        </li>
        @endforeach
    </div>
    <footer>
        @include('footer')
    </footer>
</body>
</html>

