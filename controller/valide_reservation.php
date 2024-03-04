<?php

include "root.php";

if ($_SESSION["permission"] == 2){
    
    /* Model Reservation */
    // categories des salles
    include "$racine/model/categorie_salle.inc.php";
    include "$racine/model/etat.inc.php";
    include "$racine/model/reservation.inc.php";
    include "$racine/model/periode.inc.php";
    include "$racine/model/salle.inc.php";

    $categorie_salle = getCategorie();
    $reservation = getReservation();
    $etat = getEtat();


    // Appuie sur le boutton Enregistrer
	if (isset($_POST["edit_reserv"])){
		// for ($i = 0; $i < count($reservation); $i++) {
        //     getUpdateReservation($reservation[$i]["id_reserv"], $_POST[$etat_choisi]);
        //     echo "id reservation: ".$reservation[$i]["id_reserv"]." etat select: ".$_POST[$etat_choisi];
        // }

        // foreach ($_POST['etat_select'] as $id_reserv => $id_etat) {
        //     getUpdateReservation($id_reserv, $id_etat);
        //     echo "id reservation: ".$id_reserv." etat select: ".$id_etat;
        // }

        $salle = getSallewithID($reservation[$i]["salle_nom"]);
        // $date = new DateTime($reservation[$i]["date"]);
        // $date->format("d/m/Y");

        $periode = getPeriodewithID($reservation[$i]["periode"]); // nom periode
        verifReservation($salle, $date, $periode, $_SESSION["structure"]);
	}

    /* Vue Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueValideReservation.php";
}
else{
    header("Location: ./?action=login");
}

?>