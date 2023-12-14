<?php
include 'connexion.inc.php';

// Change l'etat d'une reservation en valide
$request_annule = "UPDATE `reservation` SET `idEtat` = 1 WHERE `reservation`.`utilisateur_id` = ".$_SESSION["id_utilisateur"].";";
$connect_annule = $connexion->query($request_annule);
$row_annule = $connect_annule->fetch();
?>