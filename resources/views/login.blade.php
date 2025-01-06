<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('header')
    </header>
    <!-- Afficher une alerte si une erreur de validation ou de connexion existe -->
    <div class="main">
    <div class="login-container">
        <h2>Se connecter</h2>
        <!-- Formulaire de connexion -->
        <form action="{{ route('user.login') }}" method="POST" id="login-form">
            <div class="form-group">
                <label for="nickName">Nom d'utilisateur :</label>
                <input type="text" name="nickName" id="nickName" required>

            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required>
                @error('failed')
                    <strong> {{ $message }}</strong>
                @enderror
                
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>

        <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous ici</a>.</p>
    </div>
</div>

    <footer>
        @include('footer')
    </footer>
</body>

</html>