$(document).ready(function () {
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
});
