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
    <hr>
    <div class="purpose">
        <h2>Bienvenue {{session('name')}}</h2>
    </div>

    <div id="main-index">
        <h2>Mes ouvrages</h2>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>