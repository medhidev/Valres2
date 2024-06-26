<?php

include "root.php";
include "$racine/model/utilisateur.inc.php";

//  Reset les valeur de session
$_SESSION["id"] = null;
$_SESSION["permission"] = null;
$_SESSION["nom"] = null;
$_SESSION["structure"] = null;

if(isset($_POST["connecter"])){

    $info = getInfo($_POST["email"], $_POST["password"]);

    // la requête a fonctionne
    if (!empty($info)){

        // Données récupérer
        $_SESSION["id"] = $info["utilisateur_id"];
        $_SESSION["permission"] = $info["id_perm"];
        $_SESSION["nom"] = $info["nom"];
        $_SESSION["structure"] = $info["structure_nom"];


        // Connexion réussie
        switch ($_SESSION["permission"]){
            // Utilisateur
            case 1:
                header ("Location: ./?action=reservation");
                break;

            // Secretaire
            case 2:
                header ("Location: ./?action=valide");
                break;

            // Responsable
            case 3:
                header ("Location: ./?action=creer");
                break;

            // Admin
            case 4:
                header ("Location: ./?action=permission");
                break;
        }
    }

    else{
        echo sendError("Compte introuvable");
    }

    if (isset($_POST["connecter"])){

    }
}

/* Vue Login / Connexion  */
include "$racine/vue/entete.php";
include "$racine/vue/vueConnexion.php";

?>
