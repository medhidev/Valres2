<?php

// Permet d'obtenir une liste de réservation
function getReservation(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id;";

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

// Affiche toute les reservations qui on une categorie et un nom de structure
function dateEmpty($categorie, $structure){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id
        WHERE u.structure_nom = '".$structure."' AND s.categorie = ".$categorie.";";

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

// Permet d'obtenir la liste des reservations sans nom de structure
function structureEmpty($categorie, $date){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id
        WHERE s.categorie = '".$categorie."' AND r.date = '".$date."';";

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

// Permet d'obtenir la liste des reservations de l'utilisateur
function getThisReservation(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id
        WHERE u.structure_nom = '".$_SESSION["structure"]."';";

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

// Filtre de reservation
function searchReservation ($categorie, $structure, $date){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id
        INNER JOIN categorie_salle c ON c.id = s.categorie
        WHERE c.id = ".$categorie." AND r.date = '".$date."' AND u.structure_nom = '".$structure."';";

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