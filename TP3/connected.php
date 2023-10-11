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
    } else
        $errorText = "Erreur de login/password";
} else
    $errorText = "Merci d'utiliser le formulaire de login";
if (!$successfullyLogged) {
    echo $errorText;
} else {
    echo "<h1>Bienvenue " . $login . "</h1>";
    echo "<h2>Votre mot de passe est : " . $tryPwd . "</h2>";
}

// Avec get :'URL est : http://localhost/IDAW/TP3/connected.php?login=Squeezie&password=yotoutlemonde
