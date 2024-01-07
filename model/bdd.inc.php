<?php

// Fonction de connexion à la base de données
function connexionBDD(){
	//  Données  de connexion
	$login = 'root';
	$password = '';
	$host = 'localhost';
	$bdd = 'mdll';

	// Test de connexion
	try {
		$connexion = new PDO("mysql:host=$host;dbname=$bdd", $login, $password);
		return $connexion;

	} catch(Exception $e) {
		die('Erreur de connexion: '.$e->getMessage());
		return null;
		
	}
}

?>