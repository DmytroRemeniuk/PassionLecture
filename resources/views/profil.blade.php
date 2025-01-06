<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Profil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        @include('header')
    </header>
    <hr>
    <div class="main">
        <h1>{{$user->name}}</h1>
        <strong>Date d'entrée : </strong>{{$user->dateEntree}}<br>
        <strong>Ouvrages proposés : </strong>{{$nbBooks}}<br>
        <strong>Appréciations faites : </strong>{{$nbVotes}}<br>
        <h2>Voici la liste des livres ajoutés :</h2>
        <div class="books">
            @if ($books->isEmpty())
                <p>Aucun livre publié pour le moment.</p>
            @else
                @foreach ($books as $book)
                <div class="book-item-index">
                    <a href="{{ route('details', ['idOuvrage' => $book->ouvrage_id]) }}">
                        <img class="book-format" src="{{ asset('img/' . $book->image)}}" alt="{{ asset('Couverture du livre' . ' ' . $book->titre)}}">
                    </a>
                    <strong>Titre: {{ $book->titre }}</strong>
                    Auteur: {{ $book->fkAuteur->prenom}} {{ $book->fkAuteur->nom}}<br>
                    Pseudo: {{ $book->fkUtilisateur->name}}
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>