<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// temporaire !!!
session_start();
$_SESSION["id"] = 7;
$_SESSION["utilisateur"] = "responsable";


/* Model Login / Connexion */
include "$racine/model/bdd.inc.php";
include "$racine/model/login.inc.php";

if(isset($_POST["connecter"])){
    echo verifUtilisateur();
}

/* Vue Login / Connexion  */
include "$racine/vue/entete.php";
include "$racine/vue/vueConnexion.php";
?>
