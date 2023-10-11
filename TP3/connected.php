<?php
// on simule une base de données
$users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi',
    'Squeezie' => 'yotoutlemonde'
);
$login = "anonymous";
$errorText = "";
$successfullyLogged = false;
if (isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
    // si login existe et password correspond
    if (array_key_exists($tryLogin, $users) && $users[$tryLogin] == $tryPwd) {
        $successfullyLogged = true;
        $login = $tryLogin;
        session_start(); //commencer session ici créer l'objet session et assigner la variable 
        $_SESSION['username'] = $login;
        $username = $_SESSION['username'];
    } else
        $errorText = "Erreur de login/password";
} else
    $errorText = "Merci d'utiliser le formulaire de login";
if (!$successfullyLogged) {
    echo $errorText;
} else {
    echo "<h1>Bienvenue " . $login . "</h1>";
    echo "<h2>Votre mot de passe est : " . $tryPwd . "</h2>"; // à enlever une fois que session gérera ça
}
if (isset($_SESSION['username'])) {
    echo "<h1>Vous êtes sur la session de $username dans connected </h1>"; // Affiche le nom d'utilisateur sur la page
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page connected</title>
</head>

<body>
    <p>Cliquez sur le lien ci-dessous pour accéder à une autre page :</p>

    <!-- Lien vers une autre page (par exemple, page2.html) -->
    <a href="page2.php">Aller à la page 2</a>
</body>

</html>