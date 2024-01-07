<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

session_start();
$_SESSION['utilisateur'] = 'Medhi Grimal'; // Déconnecte l'utilisateur
// $_SESSION['permission'] = null; // Pour la gestion des droits
$_SESSION['permission'] = 'utilisateur'; // Pour la gestion des droits
$_SESSION["structure"] = 'Fives Nordon';

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
