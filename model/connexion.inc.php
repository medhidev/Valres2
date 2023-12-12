<?php

// Donées de connexion
$host="localhost";
$db_name="mdll";
$user="root";
$password="";

try{
    $connexion = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
} catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}
?>