<?php

include "root.php";

// Vérifie que le compte sois un Responsable ou une Secretaire
if ($_SESSION["permission"] == 3 || $_SESSION["permission"] == 2){

    /* Model creation Reservation */
    include "$racine/model/reservation.inc.php";
    include "$racine/model/salle.inc.php";
    include "$racine/model/periode.inc.php";

    $salle = getSalle();
    $periode = getPeriode();

    // Vérifie la validation du formulaire
    if (isset($_POST["add_reserv"])){

        // ajoute une reservation
        if (ajouterReserveration($_SESSION["id"], $_POST["salle_select"], $_POST["date_select"], $_POST["periode_select"])){
            echo sendValide("Creation de la reservation avec succès");
        }
        
        else {
            echo sendError("Creation de la reservation Invalide");
        }

    }

    /* Vue creation Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueCreerReservation.php";
}
else{
    header("Location: ./?action=login");
}

?>