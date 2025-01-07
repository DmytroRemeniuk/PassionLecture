<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassionLecture - Inscription</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('header')
    </header>
    <div class="main">
    <div class="login-container">
        <h2>S'inscrire</h2>
        <!-- Formulaire d'inscription -->
        <form action="{{ route('user.register') }}" method="POST" id="login-form">
        @csrf <!-- Protection CSRF -->
            <div class="form-group">
                <label for="name">Nom d'utilisateur :</label>
                <input type="text" name="name" id="name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="submit-btn">S'inscrire</button>
        </form>
    </div>
</div>

    <footer>
        @include('footer')
    </footer>
</body>

</html>