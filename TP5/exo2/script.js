$(document).ready(function () {
    /*
    $("#addStudentForm").submit(function (event) {
        // Empêcher l'envoi du formulaire par défaut
        event.preventDefault();

        // Récupérer les données du formulaire
        var formData = {
            id: $("#inputId").val(),
            name: $("#inputName").val(),
            email: $("#inputEmail").val(),
            // Ajoutez d'autres champs ici selon votre formulaire
        };

        // Envoyer la requête AJAX
        $.ajax({
            type: "POST",
            contentType: "application/json",
            url: "http://localhost/IDAW/TP4/exo5/utilisateurs.php",
            data: JSON.stringify(formData),
            success: function (response) {
                // Traiter la réponse du serveur
                console.log("Réponse du serveur :", response);
                // Mettre à jour votre interface utilisateur ici si nécessaire
            },
            error: function (error) {
                // Traiter les erreurs
                console.error("Erreur :", error);
            }
        });
    });
    */
});

function sendDataToServer(name, email) {

    $.ajax({
        type: "POST", // Utilisez la méthode POST pour envoyer des données
        url: "http://localhost/IDAW/TP4/exo5/utilisateurs.php", // URL de votre API
        data: JSON.stringify({
            name: name,
            email: email
        }),
        dataType: "json",
        success: function (response) {
            // Traitez la réponse du serveur si nécessaire
            console.log("Réponse du serveur :" + response);
        },
        error: function (error) {
            // Traitez les erreurs
            console.error("Erreur :" + error);
        }
    });
}

function getAllDataFromServer() {
    $.ajax({
        type: "GET", // Utilisez la méthode GET pour récupérer des données
        url: "http://localhost/IDAW/TP4/exo5/utilisateurs.php", // URL de votre API pour récupérer tous les éléments
        success: function (response) {
            // Traitez la réponse du serveur ici
            console.log("Réponse du serveur :", response);

            // Mettez à jour votre interface utilisateur avec les données reçues du serveur
            // Par exemple, si response est un tableau d'objets, vous pouvez les afficher dans un tableau HTML
            // Utilisez la boucle pour parcourir la réponse et mettre à jour votre interface utilisateur
            // Exemple d'affichage dans une table HTML (supposons que #data-table est l'ID de votre élément de tableau dans HTML) :
            for (let i = 0; i < response.length; i++) {
                $("#studentsTableBody").append(`<tr>
                    <td>${response[i].id}</td>
                    <td>${response[i].name}</td>
                    <td>${response[i].email}</td>
                    <td><button class="btn btn-info btn-sm editBtn">Éditer</button></td>
        <td><button class="btn btn-danger btn-sm deleteBtn">Supprimer</button></td>
                </tr>`);
            }
        },
        error: function (error) {
            // Traitez les erreurs ici 
            console.error("Erreur :", error);
        }
    });
}

function deleteDataFromServer(idToDelete) {
    $.ajax({
        type: "DELETE",
        url: `http://localhost/IDAW/TP4/exo5/utilisateurs.php?id=${idToDelete}`,
        success: function (response) {
            console.log("Élément supprimé avec succès :", response);
        },
        error: function (error) {
            console.error("Erreur lors de la suppression :", error);
        }
    });
}

function updateDataOnServer(idToUpdate, updatedData) {
    $.ajax({
        type: "PUT",
        url: `http://localhost/IDAW/TP4/exo5/utilisateurs.php?id=${idToUpdate}`,
        contentType: "application/json",
        data: JSON.stringify(updatedData),
        success: function (response) {
            console.log("Utilisateur mis à jour avec succès :", response);
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.responseJSON ? xhr.responseJSON.error : 'Erreur inattendue côté serveur.';
            alert('Erreur : ' + errorMessage); //accéder à la réponse renvoyée par le serveur en cas d'erreur (ou de succès) et de stocker cette réponse dans la variable xhr.responseJSON
        }
    });
}

