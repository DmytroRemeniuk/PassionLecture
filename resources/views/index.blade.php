<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Accueil</title>
    <link rel="stylesheet" href="../css/lecturepassion.css">
</head>
<body>
    <header>
        @include("header")
    </header>
    <div id="main">
        <h2>Utilité du site</h2>
        <p>Ce site est conçu pour permettre aux passionnés de lecture de découvrir, partager et discuter des ouvrages récents ou classiques.</p>
        <h2>Cinq derniers ouvrages</h2>
        @foreach ($books as $book)
            <li>{{ $book->titre }}</li>
        @endforeach        
    </div>
    <footer>
        @include("footer")
    </footer>
</body>
</html>
