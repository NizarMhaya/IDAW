<?php
// Vérifie si le formulaire a été soumis
if (isset($_GET['css'])) {
    // Récupère l'identifiant de style choisi par l'utilisateur
    $selectedStyle = $_GET['css'];

    // Stocke l'identifiant de style dans un cookie valable pendant 1 heure (3600 secondes)
    setcookie('selected_style', $selectedStyle, time() + 3600, '/');

    // Redirige l'utilisateur vers la même page pour appliquer le style choisi
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de Style</title>
    <?php
    // Vérifie si le cookie de style est défini
    if (isset($_COOKIE['selected_style'])) {
        // Applique le style stocké dans le cookie
        echo '<link rel="stylesheet" href="' . $_COOKIE['selected_style'] . '.css">';
    } else {
        echo '<link rel="stylesheet" href=" style1.css">'; // pour mettre un style par défaut si on a ni GET ni COOKIE
    }
    ?>

</head>

<body>
    <h1>Choisissez un style :</h1>
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1">thème clair</option>
            <option value="style2">thème sombre</option>
        </select>
        <input type="submit" value="Appliquer" />
    </form>
</body>

</html>