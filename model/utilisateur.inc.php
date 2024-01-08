<?php 

/*
On sait l'ID de l'utilisateur et une valeur que l'on veut récupérer

*/
// function getInfo($id){
//     $result = array();

//     try {
//         $connexion = connexionBDD();
//         $req_sql = " SELECT *
//         FROM utilisateur
//         WHERE utilisateur_id = ".$id.";";

//         $request = $connexion->query($req_sql);
//         $row = $request->fetch();

//     } catch (Exception $e){
//         die("Erreur: ".$e->getMessage());
//     }

//     // renvoie les informations concernant l'ID d'un utilisateur
//     return $result;
// }

// Vérifie qu'un compte soit présent dans la base de donnée
function getInfo($login, $mdp){
    
    // script de connexion à la BDD à compléter
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT * FROM Utilisateur WHERE mail = '$login' AND mdp = '$mdp'";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();
        $result = $row;

    } catch (Exception $e){
        die("Erreur de connexion: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}

?>