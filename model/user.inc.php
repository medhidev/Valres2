<?php

include 'connexion.inc.php';

// Récupère le nom et prenom des utilisateurs
$request_user = "SELECT nom, prenom FROM utilisateur;";
$connect_user = $connexion->query($request_user);
$row_user = $connect_user->fetch();

?>