<?php

// $_SESSION['utilisateur'] = null; // Déconnecte l'utilisateur
// $_SESSION['permission'] = null; // Pour la gestion des droits

$_SESSION['utilisateur'] = null;
$_SESSION['permission'] = null;

/* Vue Login / Connexion  */
include "$racine/vue/entete.php";
include "$racine/vue/vueConnexion.php";
?>