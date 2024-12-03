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
        <div id="filter">
            <!--<a href="{{ route('books.index') }}" class="{{ $category === null ? 'active' : '' }}">Tous</a>
            <a href="{{ route('books.index', ['category' => 'Livre']) }}" class="{{ $category === 'Livre' ? 'active' : '' }}">Livre</a>
            <a href="{{ route('books.index', ['category' => 'Roman']) }}" class="{{ $category === 'Roman' ? 'active' : '' }}">Roman</a>
            <a href="{{ route('books.index', ['category' => 'Bande-dessinee']) }}" class="{{ $category === 'Bande-dessinee' ? 'active' : '' }}">Bande dessinée</a>
            <a href="{{ route('books.index', ['category' => 'Manga']) }}" class="{{ $category === 'Manga' ? 'active' : '' }}">Manga</a>-->
        </div>

        <h2>Tous les ouvrages</h2>

        <div id="books-list">
            @if($ouvrages->isEmpty())
                <p>Aucun ouvrage trouvé pour cette catégorie.</p>
            @else
                @foreach($ouvrages as $ouvrage)
                    <div class="book-item">
                        <div class="book-image" style="background-image: url('{{ $ouvrage->Image }}');">
                        </div>
                        <div class="book-details">
                            <h3>{{ $ouvrage->titre }}</h3>
                            <p><strong>Auteur :</strong> {{ $ouvrage->auteur->prenom }} {{ $ouvrage->auteur->nom }}</p>
                            <p><strong>Pseudo :</strong> {{ $ouvrage->auteur->pseudo }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
