<?php

// A enlever après les tests
session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

/* Model Salle */
// Import la méthode de connexion à la base de donnée
include "$racine/model/bdd.inc.php";

// categories des salles
include "$racine/model/categorie_salle.inc.php";
$categorie_salle = getCategorie();

// Liste des salles
include "$racine/model/salle.inc.php";
$salle = getSalle();

/* Vue Salle */
include "$racine/vue/entete.php";
include "$racine/vue/vueSalle.php";

?>