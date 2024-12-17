<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Détails de l'ouvrage - {{ $ouvrage->titre }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <header>
        @include('header')
    </header>
    <div id="main">
        <!--</section>-->
        <h1>Détails de l'ouvrage</h1>
        <div class="detail-container">
            <div class="detail-image">
                <img src="{{ asset('img/' . $ouvrage->image) }}" alt="Couverture de {{ $ouvrage->titre }}" />
            </div>
            <div class="detail-info">
                <h2>{{ $ouvrage->titre }}</h2>
                <div class="stars">
                    <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id, 'vote' => 1]) }}" id="star1" class="star">★</a>
                    <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id, 'vote' => 2]) }}" id="star2" class="star">★</a>
                    <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id, 'vote' => 3]) }}" id="star3" class="star">★</a>
                    <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id, 'vote' => 4]) }}" id="star4" class="star">★</a>
                    <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id, 'vote' => 5]) }}" id="star5" class="star">★</a>
                </div>
                <p><strong>Auteur</strong><br> {{ $ouvrage->fkAuteur ? $ouvrage->fkAuteur->prenom . ' ' . $ouvrage->fkAuteur->nom : 'Auteur inconnu' }}</p>
                <p><strong>Catégorie</strong><br> {{ $ouvrage->fkCategorie->nom }}</p>
                <p><strong>Description</strong><br> {{ $ouvrage->resume }}</p>
                <p><strong>Année de publication</strong><br> {{ $ouvrage->annee }}</p>
            </div>
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
