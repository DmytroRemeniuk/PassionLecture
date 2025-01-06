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
    <div class="main">
        <div class="purpose">
            <h2>Utilité du site</h2>
            <p>Ce site a été conçu pour les passionnés de lecture qui souhaitent découvrir de nouveaux livres et partager leurs impressions.
                <br>Que vous aimiez les romans contemporains, les classiques ou des genres plus rares, notre plateforme vous permet de trouver des ouvrages, de publier des critiques et d'échanger avec d'autres lecteurs.
                <br><br>Nous croyons que la lecture est un voyage à partager. C'est pourquoi nous avons intégré des fonctionnalités pour faciliter les discussions et les recommandations personnalisées. Vous pourrez aussi accéder à des articles, des interviews et des analyses littéraires pour enrichir vos connaissances. Rejoindre notre site, c’est faire partie d’une communauté où la lecture devient un échange sans frontières.
            </p>
        </div>
        <h2>Cinq derniers ouvrages</h2>
        <div class="books">
            @foreach($lastFiveBooks as $book)
            <div class="book-item-index">
            @if(isset(Auth::user()->name))
                <a href="{{ route('details', ['idOuvrage' => $book->ouvrage_id]) }}">
            @else
                <a href="">
            @endif
                    <img class="book-format" src="{{ asset('img/' . $book->image)}}" alt="{{ asset('Couverture du livre' . ' ' . $book->titre)}}">
                </a>
                <strong>Titre: {{ $book->titre }}</strong>
                Auteur: {{ $book->fkAuteur->prenom}} {{ $book->fkAuteur->nom}}<br>
                Pseudo: <a href="{{ route('profil', ['idUser' => $book->fkUtilisateur->id])}}">{{ $book->fkUtilisateur ? $book->fkUtilisateur->name : 'Pseudo non défini' }}</a>
            </div>
            @endforeach
        </div>
    </div>
    <footer>
        @include('footer')
    </footer>
</body>

</html>
