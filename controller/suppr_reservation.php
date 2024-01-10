<?php

session_start();

// Import la méthode de connexion à la base de donnée
include "$racine/model/bdd.inc.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Vérifie que le compte sois un Responsable ou une Secretaire
if ($_SESSION["permission"] == 3){
    /* Model creation Reservation */
    include "$racine/model/message_system.inc.php";
    include "$racine/model/reservation.inc.php";

    $reservation = getThisReservation();

    // Vérifie la validation du formulaire
    if (isset($_POST["suppr_reserv"])){

        // Si la reservation c'est bien supprimer on affiche un succès
        if (supprimerReservation($_POST["reservation_select"])){
            echo sendValide("Suppression de la reservation avec succès");
        }
        else {
            echo sendError("Creation de la reservation Invalide");
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