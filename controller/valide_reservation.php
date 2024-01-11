<?php

session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

if ($_SESSION["permission"] == 2){
    /* Model Reservation */
    // Import la méthode de connexion à la base de donnée
    include "$racine/model/bdd.inc.php";

    // categories des salles
    include "$racine/model/categorie_salle.inc.php";
    $categorie_salle = getCategorie();

    // liste des reservations (toutes les reservations) -> par défaut
    include "$racine/model/reservation.inc.php";
    $reservation = getReservation();

    // liste etat
    include "$racine/model/etat.inc.php";
    $etat = getEtat();

    $liste_valide = array();

    for ($i = 0; $i < count($reservation); $i++) {
	    array_push($liste_valide, $_POST["etat_select"]);
    }
    
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