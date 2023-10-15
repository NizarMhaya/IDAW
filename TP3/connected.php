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
        $_SESSION['pwd'] = $tryPwd;
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
    echo '<p>Ouvrir la page page2 : <a href="index.php">ici</a></p>';
}
