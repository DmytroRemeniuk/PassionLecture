<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'ouvrage - {{ $ouvrage->titre }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        @include('header')
    </header>
    <main>
        <section class="book-detail">
            <h1>Détails de l'ouvrage</h1>
            <div class="book-container">
                <div class="book-image">
                    <img src="{{ asset('img/' . $ouvrage->image) }}" alt="Couverture de {{ $ouvrage->titre }}" />
                </div>
                <div class="book-info">
                    <h2>{{ $ouvrage->titre }}</h2>
                    <p><strong>Auteur:</strong> {{ $ouvrage->auteur ? $ouvrage->auteur->prenom . ' ' . $ouvrage->auteur->name : 'Auteur inconnu' }}</p>
                    <p><strong>Catégorie:</strong> {{ $ouvrage->categorie->nom }}</p>
                    <p><strong>Description:</strong> {{ $ouvrage->resume }}</p>
                    <p><strong>Année de publication:</strong> {{ $ouvrage->annee }}</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
