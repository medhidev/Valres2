<?php

/*

Pour chaque $action on attribue un nom de fichier
ex: liste -> listeRestos.php
permet de mieux gérer les flux de redirection (avec utilisation de la méthode GET)

*/

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "login.php";

    // différentes pages principales
    $lesActions["responsable"] = "responsable.php";
    $lesActions["secretaire"] = "secretaire.php";
    $lesActions["admin"] = "admin.php";

    // différentes actions sur le compte
    $lesActions["login"] = "login.php";
    $lesActions["logout"] = "logout.php";

    // différentes pages tiers
    $lesActions["reservation"] = "reservation.php";
    $lesActions["salle"] = "salle.php";

    // vérifie l'existance du chemain d'accès
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}
?>