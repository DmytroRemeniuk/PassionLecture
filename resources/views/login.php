<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('header')
    </header>

    <div id="login-container">
        <h2>Se connecter</h2>
        <!-- Formulaire de connexion -->
        <form action="login.php" method="POST" id="login-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" id="username" required>
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
