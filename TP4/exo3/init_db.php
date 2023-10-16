<?php
require_once('config.php'); // Inclut le fichier de configuration de la base de données
require_once('template_connexion.php');

try {
    // Connexion à la base de données
    $connectionString = "mysql:host=" . _MYSQL_HOST;
    if (defined('_MYSQL_PORT'))
        $connectionString .= ";port=" . _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Chemin du fichier SQL contenant les commandes SQL pour initialiser la base de données
    $sqlFile = 'sql/create_db.sql';

    // Exécute les commandes SQL depuis le fichier en utilisant file_get_contents
    $sqlCommands = file_get_contents($sqlFile);
    $pdo->exec($sqlCommands);

    echo 'La base de données a été initialisée avec succès.';
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
