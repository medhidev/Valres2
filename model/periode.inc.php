<?php

// Permet d'obtenir toutes les périodes
function getPeriode(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT libelle FROM periode;";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();

        while ($row){
            $result[] = $row;
            $row = $request->fetch();
        }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

?>