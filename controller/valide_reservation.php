<?php

include "root.php";

if ($_SESSION["permission"] == 2){
    
    /* Model Reservation */
    // categories des salles
    include "$racine/model/categorie_salle.inc.php";
    $categorie_salle = getCategorie();

    // liste des reservations (toutes les reservations) -> par défaut
    include "$racine/model/reservation.inc.php";
    $reservation = getReservation();

    // liste etat
    include "$racine/model/etat.inc.php";
    $etat = getEtat();

    // var_dump($_POST["etat_select"]);

    // for ($i = 0; $i < count($reservation); $i++) {
    //     getUpdateReservation($i, $_POST["etat_select".$i]);
    // }
    
    // Appuie sur le boutton Enregistrer
	if (isset($_POST["edit_reserv"])){
		echo var_dump($liste_valide);
	}

    /* Vue Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueValideReservation.php";
}
else{
    header("Location: ./?action=login");
}

?>