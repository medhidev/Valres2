<style>
	body{
		font-family: arial;
	}

	li {
		display: inline-block;
	}

	a{
		margin-right: 10px;
		text-decoration: none;
		color: #1E90FF
	}

	input:focus{
        /* border: none; */
        outline: none;
    }
</style>

<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// echo "ID: ".$_SESSION["id"]."<br>";
// echo "Perm: ".$_SESSION["permission"]."<br>";
// echo "Nom: ".$_SESSION["nom"];

?>

<!-- NAV BAR -->

<!-- UTILISATEUR -->
<?php if ($_SESSION["permission"] == 1){ ?>
	<li><a href="./?action=reservation">Reservations</a></li>
	<li><a href="./?action=salle">Salles</a></li>
	<li><a href="./?action=login"><?= $_SESSION["nom"]; ?></a></li>
<?php } ?>

<!-- SECRETAIRE -->
<?php if ($_SESSION["permission"] == 2){ ?>
	<li><a href="./?action=creer">Créer</a></li>
	<li><a href="./?action=reservation">Reservations</a></li>
	<li><a href="./?action=salle">Salles</a></li>
	<li><a href="./?action=login"><?= $_SESSION["nom"]; ?></a></li>
<?php } ?>

<!-- RESPONSABLE -->
<?php if ($_SESSION["permission"] == 3){ ?>
	<li><a href="./?action=creer">Créer</a></li>
	<li><a href="./?action=suppr">Supprimer</a></li>
	<li><a href="./?action=reservation">Reservations</a></li>
	<li><a href="./?action=salle">Salles</a></li>
	<li><a href="./?action=login"><?= $_SESSION["nom"]; ?></a></li>
<?php } ?>

<!-- ADMIN -->
<?php if ($_SESSION["permission"] == 4){ ?>
	<li><a href="./?action=permission">Permissions</a></li>
	<li><a href="./?action=reservation">Reservations</a></li>
	<li><a href="./?action=salle">Salles</a></li>
	<!-- Mettre le Nom de l'utilisateur ! -->
	<li><a href="./?action=login"><?= $_SESSION["nom"]; ?></a></li>
<?php } ?>

<?php if ($_SESSION["permission"] == null && $_SESSION["id"] == null){} ?>