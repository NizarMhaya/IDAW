<?php
session_start(); // Démarre la session (assurez-vous d'appeler session_start() au début de chaque fichier utilisant des sessions)

// Vérifie si l'utilisateur est connecté en vérifiant la session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Récupère le nom d'utilisateur depuis la session
    echo "<h1>Vous êtes sur la session de, $username! dans la page 2</h1>"; // Affiche le nom d'utilisateur sur la page
} else {
    // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La page 2</title>
</head>

<body>
    <p>Cliquez sur le lien ci-dessous pour accéder à une autre page :</p>

    <!-- Lien vers une autre page (par exemple, page2.html) -->
    <a href="connectedoni.php">Aller à connected</a>
</body>

</html>