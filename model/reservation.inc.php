<?php

// Permet d'obtenir une liste de réservation
function getReservation(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = " SELECT p.libelle AS periode, r.id AS id_reserv, s.salle_nom, r.date, u.structure_nom AS structure, r.idEtat AS idEtat, e.libelle AS etat
        FROM reservation r
        INNER JOIN etat e ON r.idEtat = e.idEtat
        INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
        INNER JOIN periode p ON p.id_periode = r.id_periode
        INNER JOIN salle s ON s.id = r.salle_id;";

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

// Créer une reservation
function ajouterReserveration($id_user, $salle, $date, $periode){
    $result = true;

    // Secretaire
    if ($_SESSION["permission"] == 2)
        $etat = 1;
    else
        $etat = 2;

    try {
        $connexion = connexionBDD();

        // Si l'utilisateur est secretaire -> change l'etat en valide
        if($_SESSION["id"] == 2)
            $etat = 1;

        $req_sql = "INSERT INTO reservation (`utilisateur_id`, `salle_id`, `date`, `id_periode`, `idEtat`) VALUES
        (".$id_user.", ".$salle.", '".$date."', ".$periode.", ".$etat.");";

        $request = $connexion->prepare($req_sql);
        $request->execute();
        $row = $request->fetch();

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

// Vérifie une reservation
// Si trouve la reservation -> true
// Sinon false
function verifReservation($salle, $date, $periode, $structure){
    $result = true;

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT r.salle_id AS salle_id, r.date AS date, r.id_periode AS periode_id, u.structure_nom AS structure
        FROM reservation r
        INNER JOIN utisateur u ON u.utilisateur_id = r.utilisateur_id
        WHERE r.salle_id = :salle
        AND r.date = :date
        AND r.id_periode = :periode
        AND u.structure_nom = :structure";

        echo $req_sql;

        $request = $connexion->prepare($req_sql);

        // Paramètres
        $request->bindValue("salle", $salle, PDO::PARAM_INT);
        $request->bindValue("date", $date, PDO::PARAM_STR);
        $request->bindValue("periode", $periode, PDO::PARAM_INT);
        $request->bindValue("structure", $structure, PDO::PARAM_STR);

        $request->execute();
        $row = $request->fetch();

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

// récupère tout les réservation en fonction de l'ID du compte
function getThisReservation(){
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT * FROM reservation WHERE utilisateur_id = ".$_SESSION["id"].";";

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

// Supprime une reservation
function supprimerReservation($id_salle, $date, $id_periode){
    $result = true;

    try {
        $connexion = connexionBDD();

        // Si l'utilisateur est secretaire -> change l'etat en valide
        if($_SESSION["id"] == 2)
            $etat = 1;

        $req_sql = "DELETE FROM reservation WHERE salle_id = :salle AND date = :date AND id_periode = :periode";

        $request = $connexion->prepare($req_sql);

        // Vérification des champs
        $request->bindValue(':salle', $id_salle, PDO::PARAM_INT);
        $request->bindValue(':date', $date, PDO::PARAM_STR);
        $request->bindValue(':periode', $id_periode, PDO::PARAM_INT);

        $request->execute();
        $row = $request->fetch();

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    return $result;
}

// Modifie une reservation
function getUpdateReservation($id_reserv, $id_etat){
    $result = false;
    try {
        $connexion = connexionBDD();
        $req_sql = "UPDATE reservation SET idEtat = :id_etat WHERE id = :id_reserv;";
        $request = $connexion->prepare($req_sql);
        $request->bindValue("id_etat", $id_etat, PDO::PARAM_INT);
        $request->bindValue("id_reserv", $id_reserv, PDO::PARAM_INT);
        $request->execute();
        $result = true;

    } catch (Exception $e){
        $result = false;
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}
?>