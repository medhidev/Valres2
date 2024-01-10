<?php

// A enlever après les tests
session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Vérifie que l'utilisateur soit connecté pour pouvoir accéder aux salles
if ($_SESSION["permission"] != null){
    /* Model Salle */
    // Import la méthode de connexion à la base de donnée
    include "$racine/model/bdd.inc.php";

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