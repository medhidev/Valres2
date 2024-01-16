<?php
// Liste des noms de salles et des noms de catégories
function getStructure(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT libelle FROM structure";

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

?>