<?php
require_once('config.php');
require_once('template_connexion.php');

// Récupération des données soumises par le formulaire
$name = $_POST['name'];
$email = $_POST['email'];

// Préparation et exécution de la requête d'insertion
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->execute();

echo 'Nouvelle ligne ajoutée avec succès.';
header('Location: users.php');
exit();
