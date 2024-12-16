<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('header')
    </header>
    <!-- Afficher une alerte si une erreur de validation ou de connexion existe -->
    @if ($errors->has('email'))
    <div class="alert alert-danger">
        <strong>{{ $errors->first('email') }}</strong>
    </div>
    @endif

    <div id="login-container">
        <h2>Se connecter</h2>
        <!-- Formulaire de connexion -->
        <form action="{{ route('user.login') }}" method="POST" id="login-form">
            <div class="form-group">
                <label for="email">Nom d'utilisateur :</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>

        <p>Pas encore de compte ? <a href="register.php">Inscrivez-vous ici</a>.</p>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>

</html>