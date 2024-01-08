<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

/* Model Reservation */
// Import la méthode de connexion à la base de donnée
include "$racine/model/bdd.inc.php";

// categories des salles
include "$racine/model/categorie_salle.inc.php";
$categorie_salle = getCategorie();

// liste des reservations (toutes les reservations) -> par défaut
include "$racine/model/reservation.inc.php";
$reservation = getReservation();

/* Vue Reservation */
include "$racine/vue/entete.php";
include "$racine/vue/vueValideReservation.php";

?>