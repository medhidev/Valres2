<?php

session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

/* Model creation Reservation */
include "$racine/model/message_sytem.inc.php";
include "$racine/model/reservation.inc.php";
include "$racine/model/reservation.inc.php";

if ($_SESSION["utilisateur"] == "responsable"){
    if (isset($_POST["add_reserv"])){

        // Si la reservation c'est bien créer -> alors on affiche un message de validité
        if (ajouterReserveration($_SESSION["id"], $salle, $date, $periode)){
            echo sendValide("Creation de la reservation avec succès");
        }
        else {
            echo sendError("Creation de la reservation Invalide");
        }
    }
}
else {
    echo sendError("Vous n'avez pas accès à cette page !");
}

/* Vue creation Reservation */


?>