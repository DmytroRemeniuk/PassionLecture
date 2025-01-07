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
    <div class="main">
        <h1>Détails de l'ouvrage</h1>
        <div class="detail-container">
            <div class="detail-image">
                <img src="{{ asset('img/' . $ouvrage->image) }}" alt="Couverture de {{ $ouvrage->titre }}" />
            </div>
            <div class="detail-info">
                <h2>{{ $ouvrage->titre }}</h2>
                <p><strong>Auteur</strong><br> {{ $ouvrage->fkAuteur ? $ouvrage->fkAuteur->prenom . ' ' . $ouvrage->fkAuteur->nom : 'Auteur inconnu' }}</p>
                <p><strong>Editeur</strong><br>{{$ouvrage->fkEditeur->nom}}</p>
                <p><strong>Catégorie</strong><br> {{ $ouvrage->fkCategorie->nom }}</p>
                <p><strong>Résumé</strong><br> {{ $ouvrage->resume }}</p>
                <p><strong>Année de publication</strong><br> {{ $ouvrage->annee }}</p>
                <p><strong>Nombre de pages<br></strong>{{$ouvrage->nbPages}}</p>
                <p><a href="{{$ouvrage->extrait}}">Lien sur extrait</a></p>
                <div class="stars" id="stars" data-user-vote="{{ $userVote ?? 0 }}">
                    @for ($i = 1; $i <= 5; $i++)
                        <a href="{{ route('details', ['idOuvrage' => $ouvrage->ouvrage_id, 'vote' => $i]) }}"
                        id="star{{ $i }}"
                        class="star">
                            ★
                        </a>
                    @endfor
                </div>
                <div class="stars">
                    {{$avgAppreciation . '★(' . $nbAppreciations . ')'}}
                </div>
            </div>
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
