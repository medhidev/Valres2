<?php
include 'connexion.inc.php';
// include '../controller/search_reserv.php';

// Si l'id de session n'est pas vide
if(!empty($_SESSION['id'])){
    $request_reserv = "SELECT r.utilisateur_id, s.salle_nom, cs.libelle AS categorie, e.libelle AS etat, r.date
    FROM categorie_salle cs
    INNER JOIN salle s ON cs.id = s.categorie
    INNER JOIN reservation r ON r.salle_id = s.id
    INNER JOIN etat e ON e.idEtat = r.idEtat
    WHERE r.utilisateur_id = ".$_SESSION['id'].";";

    $connect_reserv = $connexion->query($request_reserv);
    $row_reserv = $connect_reserv->fetch();
}
?>