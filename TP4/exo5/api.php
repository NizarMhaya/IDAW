<!-- 
GET /utilisateurs : Récupère tous les utilisateurs de la base de données.
POST /utilisateurs : Crée un nouvel utilisateur dans la base de données.
DELETE /utilisateurs : Supprime un utilisateur de la base de données en utilisant son ID. -->


<?php
header('Content-Type: application/json'); // Définir le type de contenu JSON

require_once('config.php');

// Gérer la méthode GET pour récupérer tous les utilisateurs
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $users = get_users($pdo);
    echo json_encode($users);
}

// Gérer la méthode POST pour créer un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $result = create_user($pdo, $inputData);
    echo json_encode($result);
}

// Gérer la méthode DELETE pour supprimer un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // $inputData = json_decode(file_get_contents('php://input'), true);
    $result = delete_user($pdo, $_GET);
    echo json_encode($result);
}

// Fonction pour récupérer tous les utilisateurs
function get_users($pdo)
{
    $request = $pdo->prepare("SELECT * FROM users");
    $request->execute();
    $users = $request->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

// Fonction pour créer un nouvel utilisateur
function create_user($pdo, $data)
{
    $name = $data['name']; // Récupération du nom depuis les données d'entrée
    $email = $data['email']; // Récupération de l'email depuis les données d'entrée

    try {
        // Préparez la requête SQL d'insertion avec le champ "name"
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");

        // Liez les valeurs des paramètres
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        // Exécutez la requête
        $stmt->execute();

        // Retournez un message de succès
        return array('message' => 'Nouvel utilisateur créé avec succès.');
    } catch (PDOException $e) {
        // En cas d'erreur, retournez un message d'erreur
        return array('error' => 'Erreur lors de la création de l\'utilisateur : ' . $e->getMessage());
    }
}


// Fonction pour supprimer un utilisateur
function delete_user($pdo, $data)
{
    $user_id = $data['id']; // Récupération de l'ID de l'utilisateur depuis les données d'entrée

    try {
        // Préparez la requête SQL de suppression en utilisant l'ID de l'utilisateur
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");

        // Liez la valeur de l'ID en tant que paramètre
        $stmt->bindParam(':id', $user_id);

        // Exécutez la requête
        $stmt->execute();

        // Vérifiez combien de lignes ont été affectées (si aucune ligne n'est affectée, l'utilisateur n'existe peut-être pas)
        if ($stmt->rowCount() > 0) {
            // Retournez un message de succès si l'utilisateur a été supprimé
            return array('message' => 'Utilisateur supprimé avec succès.');
        } else {
            // Retournez un message d'erreur si l'utilisateur n'existe pas ou n'a pas pu être supprimé
            return array('error' => 'Utilisateur non trouvé ou impossible de le supprimer.');
        }
    } catch (PDOException $e) {
        // En cas d'erreur, retournez un message d'erreur
        return array('error' => 'Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());
    }
}


// Fermer la connexion à la base de données
$pdo = null;

// https://reqbin.com/
// Pour tester la requête POST :
//url : http://localhost/IDAW/TP4/exo5/api.php
// content : mettre un json :
// {
//     "name": "Jean",
//     "email": "Jean.michel@example.com"
// }


// Pour tester la requête DELTETE :
// url dans reqbin : http://localhost/IDAW/TP4/exo5/api.php?id=35
// Pas de Json a transmettre, toute l'info doit aller dans l'url