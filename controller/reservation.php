<?php

include "root.php";

// Vérifie que le compte sois un Utilisateur ou Responsable
if ($_SESSION["permission"] == 1 || $_SESSION["permission"] == 2 || $_SESSION["permission"] == 3){
    /* Model Reservation */

    // categories des salles
    include "$racine/model/categorie_salle.inc.php";
    $categorie_salle = getCategorie();

    // liste des reservations (toutes les reservations) -> par défaut
    include "$racine/model/reservation.inc.php";
    $reservation = getReservation();

    // Différents de vérification des champs du filtre (refaire !)
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
        Structure: Vide
        Date: Vide
        */
        else if(empty($_POST["date_select"]) && empty($_POST["structure_select"])){
            $reservation_select = getReservByCategorie($_POST["categorie_select"]);
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
    }

    /* Vue Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueReservation.php";
}

else {
    header("Location: ./?action=login");
}
?>