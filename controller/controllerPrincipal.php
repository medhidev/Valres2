<?php

/*

Pour chaque $action on attribue un nom de fichier
ex: liste -> listeRestos.php
permet de mieux gérer les flux de redirection (avec utilisation de la méthode GET)

*/

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "login.php";

    // différentes connexion / déconnexion
    $lesActions["login"] = "login.php";
    $lesActions["logout"] = "login.php";
    $lesActions["register"] = "register.php";

    // Pages pour tout les comptes
    $lesActions["reservation"] = "reservation.php";
    $lesActions["salle"] = "salle.php";

    // Responsable
    $lesActions["creer"] = "creer_reservation.php";
    $lesActions["suppr"] = "suppr_reservation.php";

    // Secretaire
    $lesActions["valide"] = "valide_reservation.php";
    $lesActions["xml"] = "xml.php";

    // vérifie l'existance du chemain d'accès
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}
?>