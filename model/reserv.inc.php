<?php

include 'connexion.inc.php';

// Récupère les informations nécessaire pour chaque reservations
$request_reserv = "SELECT s.salle_nom, cs.libelle AS categorie, e.libelle AS etat, r.date
FROM categorie_salle cs
INNER JOIN salle s ON cs.id = s.categorie
INNER JOIN reservation r ON r.salle_id = s.id
INNER JOIN etat e ON e.idEtat = r.idEtat;";
$connect_reserv = $connexion->query($request_reserv);
$row_reserv = $connect_reserv->fetch();


?>