<?php
include "getRacine.php";
include "$racine/controller/controllerPrincipal.php";


if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    
    $action = "defaut";
}

// execute la méthode controleurPrincipal()
$fichier = controleurPrincipal($action);
include "$racine/controller/$fichier";

?>