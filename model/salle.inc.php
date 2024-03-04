<?php

// Liste des noms de salles et des noms de catégories
function getSalleAndCategorie(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT salle_nom, libelle
        FROM salle s
        INNER JOIN categorie_salle c ON c.id = s.categorie";

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

    // renvoie la liste des reservations
    return $result;
}

function getSalle(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT salle_nom FROM salle;";

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

    // renvoie la liste des reservations
    return $result;
}

function getSallewithID($salle){
    // $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT id FROM salle WHERE salle_nom = :salle; ";

        $request = $connexion->query($req_sql);
        $request->bindValue("salle", $salle, PDO::PARAM_STR);
        $row = $request->fetch();

        // while ($row){
        //     $result[] = $row;
        //     $row = $request->fetch();
        // }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

?>