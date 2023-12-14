<?php

include 'connexion.inc.php';

// Récupère l'ID des utilisateurs
$request_user_id = "SELECT id_utilisateur FROM utilisateur;";
$connect_user_id = $connexion->query($request_user);
$row_user_id = $connect_user->fetch();

?>