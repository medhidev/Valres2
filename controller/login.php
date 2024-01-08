<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

/* Model Login / Connexion */
include "$racine/model/bdd.inc.php";
include "$racine/model/message_system.inc.php";
include "$racine/model/utilisateur.inc.php";

if(isset($_POST["connecter"])){

    $info = getInfo($_POST["email"], $_POST["password"]);

    // la requête a fonctionne
    if (!empty($info)){

        // Données récupérer
        $_SESSION["id"] = $info["utilisateur_id"];
        $_SESSION["permission"] = $info["id_perm"];
        $_SESSION["nom"] = $info["nom"];


        // Connexion réussie
        switch ($_SESSION["permission"]){
            // Utilisateur
            case 1:
                header ("Location: ./?action=reservation");
                break;

            // Secretaire
            case 2:
                header ("Location: ./?action=reservation");
                break;

            // Responsable
            case 3:
                header ("Location: ./?action=reservation");
                break;

            // Admin
            case 4:
                header ("Location: ./?action=reservation");
                break;
        }
    }

    else{
        echo sendError("Compte introuvable");
    }
}

/* Vue Login / Connexion  */
include "$racine/vue/entete.php";
include "$racine/vue/vueConnexion.php";

?>
