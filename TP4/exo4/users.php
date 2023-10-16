<?php
require_once('config.php');
require_once('template_connexion.php');


// Affichage des résultats
echo '<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP / MySQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Bases de données MySQL</h1>
    <?php
    ?>
</body>

</html>';
// Affichage des résultats dans un tableau HTML
echo "<h2>Résultats de la requête :</h2>";
echo "<table border='1'>
<tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Actions</th> <!-- Nouvelle colonne pour les boutons de modification et de suppression -->
</tr>";

while ($row = $request->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>
    <td>{$row->id}</td>
    <td>{$row->name}</td>
    <td>{$row->email}</td>
    <td>
        <a href='modifier.php?id={$row->id}'>Modifier</a>
        <a href='supprimer.php?id={$row->id}'>Supprimer</a>
    </td>
  </tr>";
}

echo "</table>";
$pdo = null;
?>

<form action="traitement_formulaire.php" method="post">
    <label for="name">Name :</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Ajouter">
</form>