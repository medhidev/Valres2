<?php

session_start();

// Import la méthode de connexion à la base de donnée
include "$racine/model/bdd.inc.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Vérifie que le compte sois un Responsable ou une Secretaire
if ($_SESSION["permission"] == 3 || $_SESSION["permission"] == 2){
    /* Model creation Reservation */
    include "$racine/model/message_system.inc.php";
    include "$racine/model/reservation.inc.php";


    // salles
    include "$racine/model/salle.inc.php";
    $salle = getSalle();

    // périodes
    include "$racine/model/periode.inc.php";
    $periode = getPeriode();

    // Vérifie la validation du formulaire
    if (isset($_POST["add_reserv"])){

        // Si la reservation c'est bien créer -> alors on affiche un message de validité
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