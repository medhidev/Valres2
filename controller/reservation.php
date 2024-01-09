<?php

session_start();

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

// Différents de vérification des champs du filtre
if (isset($_POST["search"])){
    
    /*
    Categorie: Remplie
    Structure: Remplie
    Date: Remplie
    */
    if (!empty($_POST["categorie_select"] && $_POST["structure_select"] && $_POST["date_select"])){
        $reservation_select = searchReservation($_POST["categorie_select"], $_POST["structure_select"], $_POST["date_select"]);
    }

    /*
    Categorie: Remplie
    Structure: Remplie
    Date: Vide
    */
    else if(empty($_POST["date_select"])){
        $reservation_select = dateEmpty($_POST["categorie_select"], $_POST["structure_select"]);
    }

    /*
    Categorie: Remplie
    Structure: Vide
    Date: Remplie
    */
    else if(empty($_POST["structure_select"])){
        $reservation_select = structureEmpty($_POST["categorie_select"], $_POST["date_select"]);
    }

    /*
    Categorie: Remplie
    Structure: Vide
    Date: Vide
    */
    else if(empty($_POST["structure_select"] && $_POST["date_select"])){
        $reservation_select = getThisReservation();
    }
}

/* Vue Reservation */
include "$racine/vue/entete.php";
include "$racine/vue/vueReservation.php";

?>