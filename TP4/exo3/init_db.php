<?php
require_once('config.php'); // Inclut le fichier de configuration de la base de données
require_once('template_connexion.php');

// Exécute les commandes SQL depuis le fichier en utilisant file_get_contents
$sqlCommands = file_get_contents('sql/create_db.sql');
$pdo->exec($sqlCommands);

echo 'La base de données a été initialisée avec succès.';
