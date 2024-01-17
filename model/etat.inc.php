<?php

function getEtat(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT * FROM etat;";

        $request = $connexion->prepare($req_sql);
        $request->execute();
        $row = $request->fetch();

        while ($row){
            $result[] = $row;
            $row = $request->fetch();
        }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des états
    return $result;
}

function updateEtat(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT * FROM etat;";

        $request = $connexion->prepare($req_sql);
        $request->execute();
        $row = $request->fetch();

        while ($row){
            $result[] = $row;
            $row = $request->fetch();
        }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des états
    return $result;
}
?>