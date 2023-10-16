<?php
require_once('config.php');
require_once('template_connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Préparation et exécution de la requête de suppression
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo 'Utilisateur supprimé avec succès.';
        // Rediriger l'utilisateur vers la liste des utilisateurs après la suppression
        header('Location: users.php');
        exit();
    } catch (PDOException $erreur) {
        echo 'Erreur : ' . $erreur->getMessage();
    }
} else {
    echo 'Méthode de requête incorrecte ou ID d\'utilisateur non spécifié.';
}
