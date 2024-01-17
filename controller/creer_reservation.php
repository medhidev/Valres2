<?php

include "root.php";

// Vérifie que le compte sois un Responsable ou une Secretaire
if ($_SESSION["permission"] == 3 || $_SESSION["permission"] == 2){

    /* Model creation Reservation */
    include "$racine/model/reservation.inc.php";
    include "$racine/model/salle.inc.php";
    include "$racine/model/periode.inc.php";

    $salle = getSalle();
    $periode = getPeriode();

    // Vérifie la validation du formulaire
    if (isset($_POST["add_reserv"])){

        $salle = $_POST["salle_select"];
        $date = $_POST["date_select"];
        $periode = $_POST["periode_select"];
        
        // vérifie que la réservation n'a pas été déjà créer
        if (verifReservation($salle, $date, $periode)){ // méthode ne fonctionne pas !

            // ajoute une reservation
            if (ajouterReserveration($_SESSION["id"], $salle, $date, $periode)){
                // echo sendValide("Creation de la reservation avec succès"); (marche pas)
                header("Location: ./?action=valide");
            }

            else
                echo sendError("Problème de création de la requête");
        }

        else
            echo sendError("La reservation entrée est invalide");
    }

    /* Vue creation Reservation */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueCreerReservation.php";
}
else{
    header("Location: ./?action=login");
}

?>