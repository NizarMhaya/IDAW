<?php
require_once('config.php');
require_once('template_connexion.php');

// Récupération des données soumises par le formulaire
$name = $_POST['name'];
$email = $_POST['email'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données soumises par le formulaire
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        // Préparation et exécution de la requête de mise à jour
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo 'Utilisateur mis à jour avec succès.';
        header('Location: users.php');
        exit();
    } catch (PDOException $erreur) {
        echo 'Erreur : ' . $erreur->getMessage();
    }
} else {
    echo 'Méthode de requête incorrecte.';
}
