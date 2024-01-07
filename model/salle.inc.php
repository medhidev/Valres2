<?php

function getSalle(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT salle_nom, libelle
        FROM salle s
        INNER JOIN categorie_salle c ON c.id = s.categorie";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();

        while ($row){
            $result[] = $row;
            $row = $request->fetch();
        }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}

?>