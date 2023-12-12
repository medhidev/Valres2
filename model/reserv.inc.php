<?php

include 'connexion.inc.php';

// Récupère les informations nécessaire pour chaque reservations
$request_user = "SELECT nom, prenom FROM utilisateur;";
$connect_user = $connexion->query($request_user);
$row_user = $connect_user->fetch();


?>