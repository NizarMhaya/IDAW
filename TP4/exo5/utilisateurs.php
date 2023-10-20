<!-- 
GET /utilisateurs : Récupère tous les utilisateurs de la base de données.
POST /utilisateurs : Crée un nouvel utilisateur dans la base de données.
DELETE /utilisateurs : Supprime un utilisateur de la base de données en utilisant son ID.
PUT /utilisateurs : Met à jour un utilisateur de la base de donnée.
 -->


<?php
header('Content-Type: application/json'); // Définir le type de contenu JSON

require_once('config.php');

// // Gérer la méthode GET pour récupérer tous les utilisateurs
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     $users = get_users($pdo);
//     echo json_encode($users);
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Vérifiez s'il y a un paramètre d'URL "id"
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Récupérez l'identifiant de l'URL
        $userId = $_GET['id'];

        // Obtenez l'utilisateur par son identifiant
        $user = get_user_by_id($pdo, $userId);

        // Vérifiez si l'utilisateur a été trouvé
        if ($user) {
            http_response_code(200); // OK
            echo json_encode($user);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(array('error' => 'Utilisateur non trouvé.'));
        }
    } else {
        // Utilisez la fonction get_users pour obtenir tous les utilisateurs
        $users = get_users($pdo);

        // Vérifiez si des utilisateurs ont été trouvés
        if ($users) {
            http_response_code(200); // OK
            echo json_encode($users);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(array('error' => 'Aucun utilisateur trouvé.'));
        }
    }
}

// Gérer la méthode POST pour créer un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $result = create_user($pdo, $inputData);
    // Vérifiez le résultat de la mise à jour
    if (isset($result['message'])) {
        http_response_code(200); // OK
        echo json_encode($result);
    } elseif (isset($result['error'])) {
        http_response_code(400); // Bad Request ou tout autre code d'erreur approprié
        echo json_encode($result);
    } else {
        http_response_code(500); // Erreur interne du serveur
        echo json_encode(array("error" => "Une erreur inattendue s'est produite lors de la mise à jour de l'utilisateur."));
    }
}

// Gérer la méthode DELETE pour supprimer un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // $inputData = json_decode(file_get_contents('php://input'), true); // Comme il n'y a pas cette ligne, on ne prend pas de json de l'utilisateur de l'utilisateurs, tout est dans l'url en GET
    $result = delete_user($pdo, $_GET);
    // Vérifiez le résultat de la mise à jour
    if (isset($result['message'])) {
        http_response_code(200); // OK
        echo json_encode($result);
    } elseif (isset($result['error'])) {
        http_response_code(400); // Bad Request ou tout autre code d'erreur approprié
        echo json_encode($result);
    } else {
        http_response_code(500); // Erreur interne du serveur
        echo json_encode(array("error" => "Une erreur inattendue s'est produite lors de la mise à jour de l'utilisateur."));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $result = update_user($pdo, $inputData);

    // Vérifiez le résultat de la mise à jour
    if (isset($result['message'])) {
        http_response_code(200); // OK
        echo json_encode($result);
    } elseif (isset($result['error'])) {
        http_response_code(400); // Bad Request ou tout autre code d'erreur approprié
        echo json_encode($result);
    } else {
        http_response_code(500); // Erreur interne du serveur
        echo json_encode(array("error" => "Une erreur inattendue s'est produite lors de la mise à jour de l'utilisateur."));
    }
}


// Fonction pour récupérer tous les utilisateurs
function get_users($pdo)
{
    $request = $pdo->prepare("SELECT * FROM users");
    $request->execute();
    $users = $request->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}
// Fonction pour récupérer un utilisateur par son identifiant
function get_user_by_id($pdo, $userId)
{
    $request = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $request->bindParam(':id', $userId, PDO::PARAM_INT);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_ASSOC);
    return $user;
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
        return array('message' => 'Nouvel utilisateur cree avec succes.');
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

function update_user($pdo, $data)
{
    $id = $data['id']; // Récupération de l'ID depuis les données d'entrée
    $name = $data['name']; // Récupération du nom depuis les données d'entrée
    $email = $data['email']; // Récupération de l'email depuis les données d'entrée

    try {
        // Préparez la requête SQL de mise à jour avec les champs "name" et "email"
        $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");

        // Liez les valeurs des paramètres
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Assurez-vous que l'ID est traité comme un entier

        // Exécutez la requête
        $stmt->execute();

        // Vérifiez si la mise à jour a affecté des lignes (au moins une ligne a été mise à jour)
        if ($stmt->rowCount() > 0) {
            // La mise à jour a réussi, retournez un message de succès
            return array('message' => 'Utilisateur mis à jour avec succès.');
        } else {
            // Aucune ligne n'a été mise à jour, l'utilisateur avec l'ID spécifié n'a pas été trouvé
            return array('error' => 'Utilisateur non trouvé ou aucune mise à jour nécessaire.'); // remarque : ce message est renvoyé également si l'utilisateur existe mais que l'on met à jour avec le même mail et name
        }
    } catch (PDOException $e) {
        // En cas d'erreur, retournez un message d'erreur
        return array('error' => 'Erreur lors de la mise à jour de l\'utilisateur : ' . $e->getMessage());
    }
}



// Fermer la connexion à la base de données
$pdo = null;

// https://reqbin.com/
// Pour tester la requête POST :
//url : http://localhost/IDAW/TP4/exo5/utilisateurs.php
// content : mettre un json :
// { "name": "Jean", "email": "Jean.michel@example.com" }

// Pour tester la requête get qui utilise un id
// url : http://localhost/IDAW/TP4/exo5/utilisateurs.php?id=8
// Ne necessite pas de json

// Pour tester la requête get qui n'utilise pas un id et qui retourne tout le tableau
// url : http://localhost/IDAW/TP4/exo5/utilisateurs.php?
// Ne necessite pas de json



// Pour tester la requête DELETE :
// url dans reqbin : http://localhost/IDAW/TP4/exo5/utilisateurs.php?id=35
// Pas de Json a transmettre, toute l'info doit aller dans l'url

// Pour tester la requête PUT
// url dans reqbin : http://localhost/IDAW/TP4/exo5/utilisateurs.php?
// Le json contient : { "id":31, "name": "Gui", "email": "Gui.Theuwb@example.com" }