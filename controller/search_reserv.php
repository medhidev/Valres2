<?php

session_start();

$_SESSION["id_utilisateur"] = 0;

// vérifie que l'utilisateur est valide
$_SESSION["id_utilisateur"] = $_POST["listClient"];
echo $_POST["listClient"];

include '../model/reserv.inc.php';

header('Location: ../vue/reservation.php');
exit

?>