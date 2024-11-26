<?php
    // Inclure la base de données pour la gestion des utilisateurs
    include("Database.php");

    session_start();
    $db = Database::getInstance();

    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['user_id'])) {
        header('Location: index.php');  // Rediriger si déjà connecté
        exit;
    }

    // Traitement du formulaire de connexion
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        // Vérifier si l'utilisateur existe dans la base de données
        $user = $db->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Si l'utilisateur est trouvé et le mot de passe correspond
            $_SESSION['user_id'] = $user['id'];  // Stocker l'ID utilisateur dans la session
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');  // Rediriger vers la page d'accueil
            exit;
        } else {
            // Afficher un message d'erreur si la connexion échoue
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/lecturepassion.css">
</head>
<body>
    <header>
        <?php include("header.php") ?>
    </header>

    <div id="login-container">
        <h2>Se connecter</h2>

        <?php if (isset($error_message)) : ?>
            <div class="error-message"><?= $error_message ?></div>
        <?php endif; ?>

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
        <?php include("footer.php") ?>
    </footer>
</body>
</html>
