<?php
session_start();
include '../model/reserv_user.inc.php';

// var_dump($_POST["listClient"]);
$_SESSION['id'] = $_POST["listClient"];

?>