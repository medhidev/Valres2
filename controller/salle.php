<?php

include "root.php";

// Vérifie que l'utilisateur soit connecté pour pouvoir accéder aux salles
if ($_SESSION["permission"] != null){
    
    /* Model Salle */
    // Liste des salles
    include "$racine/model/salle.inc.php";
    $salle = getSalleAndCategorie();

    /* Vue Salle */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueSalle.php";
}

else {
    header("Location: ./?action=login");
}
?>