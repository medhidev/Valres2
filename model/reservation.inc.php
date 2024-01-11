<?php

// Permet d'obtenir une liste de réservation
function getReservation(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, r.id AS id_reserv, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
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
function getReservByCategorie($categorie){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, s.salle_nom, r.date, u.structure_nom AS structure, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id
        WHERE s.categorie = ".$categorie.";";

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

function ajouterReserveration($id_user, $salle, $date, $periode){
    $result = true;
    $etat = 2;

    try {
        $connexion = connexionBDD();

        // Si l'utilisateur est secretaire -> change l'etat en valide
        if($_SESSION["id"] == 2)
            $etat = 1;

        $req_sql = "INSERT INTO reservation (`utilisateur_id`, `salle_id`, `date`, `id_periode`, `idEtat`) VALUES
        (".$id_user.", ".$salle.", '".$date."', ".$periode.", ".$etat.");";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

function verifReservation($salle, $date, $periode){
    $result = true;

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT * FROM reservation
        WHERE salle_id = ".$salle." AND date = '".$date."' AND id_periode = ".$periode.";";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    if ($row == null){
        $result = false;
    }

    return $result;
}

// récupère tout les réservation en fonction de l'ID du compte
function getThisReservation(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT * FROM reservation WHERE utilisateur_id = ".$_SESSION["id"].";";

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

// Supprime les reservations en fonction de la ligne du tableau
function supprimerReservation($ligne_suppr){
    $result = true;

    try {
        $connexion = connexionBDD();
        $req_sql = "DELETE FROM reservation
        WHERE utilisateur_id = ".$_SESSION["id"].";";

        $request = $connexion->query($req_sql);

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

function getUpdateReservation($id_reserv, $id_etat){
    $result = false;
    try {
        $connexion = connexionBDD();
        $req_sql = "UPDATE reservation SET idEtat = ".$id_etat." WHERE id = ".$id_reserv.";";

        $request = $connexion->query($req_sql);
        $result = true;

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}

?>