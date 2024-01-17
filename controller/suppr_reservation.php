<?php

include "root.php";

// Vérifie que le compte sois un Responsable ou une Secretaire
if ($_SESSION["permission"] == 3 || $_SESSION["permission"] == 2){
    /* Model creation Reservation */
    include "$racine/model/reservation.inc.php";
    include "$racine/model/salle.inc.php";
    include "$racine/model/periode.inc.php";

    $periode = getPeriode();
    $salle = getSalle();

    if (empty(getThisReservation())){
        echo sendWarn("Aucun reservation trouvée :(");
    }
    // Liste des reservation effectué par le compte
    else
        $reservation = getThisReservation();

    // Vérifie la validation du formulaire
    if (isset($_POST["suppr_reserv"])){

        // Si la reservation c'est bien supprimer on affiche un succès
        if (supprimerReservation($_POST["salle_select"], $_POST["date_select"], $_POST["periode_select"])){
            echo sendValide("Suppression de la reservation avec succès");
        }
        else {
            echo sendError("Suppression de la reservation Impossible");
        }
    }

    /* Vue creation Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueSupprimerReservation.php";
}
else{
    header("Location: ./?action=login");
}

?>