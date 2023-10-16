<?php
require_once('config.php');
require_once('template_connexion.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Récupération des données à modifier depuis la base de données
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    if ($row) {
        // Les données ont été trouvées, afficher le formulaire de modification
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Modifier Utilisateur</title>
        </head>

        <body>
            <h1>Modifier Utilisateur</h1>
            <form action="traitement_modifier.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>"> <!-- Champ caché pour stocker l'ID de l'utilisateur à modifier -->

                <label for="name">Name :</label>
                <input type="text" id="name" name="name" value="<?php echo $row->name; ?>" required><br> <!-- Affiche le nom de l'utilisateur -->

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo $row->email; ?>" required><br> <!-- Affiche l'email de l'utilisateur -->

                <input type="submit" value="Modifier">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "ID d'utilisateur non valide.";
}
?>