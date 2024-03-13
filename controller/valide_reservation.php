<?php

include "root.php";

if ($_SESSION["permission"] == 2){
    
    /* Model Reservation */
    // categories des salles
    include "$racine/model/categorie_salle.inc.php";
    include "$racine/model/etat.inc.php";
    include "$racine/model/reservation.inc.php";
    include "$racine/model/periode.inc.php";
    include "$racine/model/salle.inc.php";

    $categorie_salle = getCategorie();
    $reservation = getReservation();
    $etat = getEtat();


    // Appuie sur le boutton Enregistrer
	if (isset($_POST["edit_reserv"])){

        foreach ($_POST as $key => $value) {

            $idReservation = substr($key, 8);

            // Si la secretaire Confirme la réservation
            if (strpos($key, 'confirm_') === 0) {
                // Changement de l'état de la réservation à "Confirmé"
                getUpdateReservation($idReservation, 1); // 1 pour "Confirmé"
            }

            // Si la secretaire met la reservation en rovisoire
            elseif (strpos($key, 'proviso_') === 0) {    
                // Changement de l'état de la réservation à "Provisoire"
                getUpdateReservation($idReservation, 2); // 2 pour "Provisoire"
            }

            // Si la secretaire Annule la réservation
            elseif (strpos($key, 'annuler_') === 0) {    
                // Changement de l'état de la réservation à "Annulé"
                getUpdateReservation($idReservation, 3); // 3 pour "Annulé"
            }
        }

        // refresh de l'affichage (pour que le tableau soit à jour)
        header("Location: ./?action=valide");

	}

    /* Vue Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueValideReservation.php";
}
else{
    header("Location: ./?action=login");
}

?>