<?php

include 'connexion.inc.php';

// Récupère le nom de la salle réserver catégorie de salle et la date de la reservation
$request_user = "SELECT nom, prenom FROM utilisateur;";
$connect_user = $connexion->query($request_user);
$row_user = $connect_user->fetch();

?>