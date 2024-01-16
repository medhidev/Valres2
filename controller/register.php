<?php

include "root.php";
include "$racine/model/utilisateur.inc.php";
include "$racine/model/structure.inc.php";

$structure = getStructure();

if (isset($_POST["register"])){

    // Données formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $id_structure = $_POST["type_structure"];
    $structure_nom = $_POST["nom_structure"];
    $structure_adresse = $_POST["adresse"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // requête
    $register = creerUser($nom, $prenom, $id_structure, $structure_nom, $structure_adresse, $email, 1, $password);
    
    // Applique l'insertion du compte dans la BDD
    if ($register){
        echo sendValide("Création du compte avec succès !");
    }
    else {
        sendError("La création du compte a échoué");
    }
    
}

// Affichage de la page
include "$racine/vue/vueCreerCompte.php";

?>