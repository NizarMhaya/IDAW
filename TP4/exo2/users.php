<?php
require_once('config.php');
$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = NULL;
try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
$request = $pdo->prepare("select * from users");
$request->execute();

// Affichage des résultats
echo '<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP / MySQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>

<body>
    <h1>Bases de données MySQL</h1>
    <?php
 //ici mettre un tableau avec les trucs de la base de donnée
 // voir la doc pour avoir les fonctions genre prepare etc qui servent à afficher des trucs
    ?>
</body>

</html>';
// Affichage des résultats dans un tableau HTML
echo "<h2>Résultats de la requête :</h2>";
echo "<table border='1'>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>";

while ($row = $request->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>
            <td>{$row->id}</td>
            <td>{$row->name}</td>
            <td>{$row->email}</td>
          </tr>";
}

echo "</table>";
$pdo = null;
