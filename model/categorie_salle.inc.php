<?php

// Récupère toute toutes les catégories des salles
function getCategorie(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $request = $connexion->query("SELECT libelle FROM categorie_salle;");
        $row = $request->fetch();

        while ($row){
            $result[] = $row;
            $row = $request->fetch();
        }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des catgories de salle
    return $result;
}

?>