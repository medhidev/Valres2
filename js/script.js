$(document).ready(function() {
    $.ajax({
        url: '../model/get_listeperm.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && Array.isArray(response)) {
                $("#nouveauPermissionSelect").empty();
                response.forEach(function(item) {
                    $("#nouveauPermissionSelect").append(new Option(item.libelle_perm, item.libelle_perm));
                });
            } else {
                console.error("Réponse non valide ou vide");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Erreur AJAX: " + textStatus + ", " + errorThrown);
        }
    });
});
$('#formNouvelUtilisateur').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../controller/ajouter_utilisateur.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
    if (response.success) {
        alert('Utilisateur ajouté avec succès');
        $('#nouvelUtilisateurModal').modal('hide');
        location.reload();
    } else {
        alert('Erreur lors de l\'ajout : ' + (response.message || 'Erreur non spécifiée'));
    }
},
error: function(jqXHR, textStatus, errorThrown) {
    alert("Erreur lors de la communication avec le serveur: " + textStatus);
}

        });
    });


    function openPopup(nom, prenom) {
        var popup = $('#nouveauModifierPopup');
        popup.modal('show');
        popup.find('.modal-title').text('Modifier la permission pour ' + nom + ' ' + prenom);
        popup.attr("data-nom", nom);
        popup.attr("data-prenom", prenom);
    }

    function nouveauUpdateData() {
        var popup = document.getElementById("nouveauModifierPopup");
        var nom = popup.getAttribute("data-nom");
        var prenom = popup.getAttribute("data-prenom");
        var nouveauLibellePerm = $('#nouveauPermissionSelect').val();

        $.ajax({
            url: '../model/update_perm.php',
            type: 'POST',
            data: {nom: nom, prenom: prenom, nouveau_libelle_perm: nouveauLibellePerm},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if(response && response.success) {
                    alert('Permission mise à jour avec succès');
                    $('#nouveauModifierPopup').modal('hide');
                    location.reload();
                } else {
                    var errorMessage = response && response.error ? response.error : 'Une erreur inattendue s\'est produite';
                    alert('Erreur lors de la mise à jour : ' + errorMessage);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Erreur de communication avec le serveur: ' + textStatus);
            }
        });
    }

    var utilisateurASupprimer;

function ouvrirConfirmationSuppression(id) {
    utilisateurASupprimer = id;
    $('#confirmationSuppressionModal').modal('show');
}

function supprimerUtilisateur() {
    $.ajax({
        url: '../model/supprimer_utilisateur.php',  // Assurez-vous que l'URL est correcte
        type: 'POST',
        data: { utilisateur_id: utilisateurASupprimer },
        success: function(response) {
            var data = JSON.parse(response);
            if(data.success) {
                alert('Utilisateur supprimé avec succès');
                location.reload();
            } else {
                alert('Erreur lors de la suppression: ' + data.message);
            }
        },
        error: function() {
            alert("Erreur lors de la communication avec le serveur.");
        }
    });
}
