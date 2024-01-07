<?php

session_start();

// Import la méthode de connexion à la base de donnée
include "$racine/model/bdd.inc.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

/* Model creation Reservation */
include "$racine/model/message_sytem.inc.php";
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
    if (ajouterReserveration($_SESSION["id"], $salle, $date, $periode)){
        echo sendValide("Creation de la reservation avec succès");
    }
    else {
        echo sendError("Creation de la reservation Invalide");
    }
}

/* Vue creation Reservation */
include "$racine/vue/entete.php";
include "$racine/vue/vueCreerReservation.php";


?>