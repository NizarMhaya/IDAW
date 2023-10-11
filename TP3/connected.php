<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
</head>

<body>

    <?php
    // Vérifie si les données de login et password existent dans la requête GET
    if (isset($_GET['login']) && isset($_GET['password'])) {
        // Récupère les valeurs des champs login et password
        $login = $_GET['login'];
        $password = $_GET['password'];

        // Affiche les valeurs des champs
        echo "<h2>Informations de connexion :</h2>";
        echo "<p><strong>Login :</strong> $login</p>";
        echo "<p><strong>Mot de passe :</strong> $password</p>";
    } else {
        // Si les données ne sont pas présentes, affiche un message d'erreur
        echo "<h2>Erreur :</h2>";
        echo "<p>Les données de connexion sont manquantes.</p>";
    }
    ?>

</body>

</html>