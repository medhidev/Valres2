<?php

include '../model/user.inc.php';

$i = 1;
while($row_user != false){
    $nom = $row_user["nom"];
    $prenom = $row_user["prenom"];

    // Affichage des utilisateurs
    echo "<option value='".$i."'>".strtolower($nom)." ".strtolower($prenom)."</option>";
    $row_user = $connect_user->fetch();
    $i++;
}

?>