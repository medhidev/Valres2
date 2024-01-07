<?php

// Vérifie qu'un compte soit présent dans la base de donnée
function verifUtilisateur(){
    
    // script de connexion à la BDD à compléter
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();

    } catch (Exception $e){
        die("Erreur de connexion: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}

?>