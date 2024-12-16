<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'ouvrage - {{ $ouvrage->titre }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <header>
        @include('header')
    </header>
    <div id="main">
        <!--<section class="book-detail-detail">-->
            <h1>Détails de l'ouvrage</h1>
            <div class="detail-container">
                <div class="detail-image">
                    <img src="{{ asset('img/' . $ouvrage->image) }}" alt="Couverture de {{ $ouvrage->titre }}" />
                </div>
                <div class="detail-info">
                    <h2>{{ $ouvrage->titre }}</h2>
                    <p><strong>Auteur</strong><br> {{ $ouvrage->fkAuteur ? $ouvrage->fkAuteur->prenom . ' ' . $ouvrage->fkAuteur->nom : 'Auteur inconnu' }}</p>
                    <p><strong>Catégorie</strong><br> {{ $ouvrage->categorie->nom }}</p>
                    <p><strong>Description</strong><br> {{ $ouvrage->resume }}</p>
                    <p><strong>Année de publication</strong><br> {{ $ouvrage->annee }}</p>
                </div>
            </div>
        <!--</section>-->
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
