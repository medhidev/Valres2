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

	nav{
		background-color: #c2dbed;
		padding: 20px;
	}
</style>

<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

?>

<!-- NAV BAR -->
<?php
if ($_SESSION["permission"] == null && $_SESSION["id"] == null){}
else { ?>
	<nav>
		<!-- UTILISATEUR -->
		<?php if ($_SESSION["permission"] == 1){ ?>
			<li><a href="./?action=reservation">Reservations</a></li>
			<li><a href="./?action=salle">Salles</a></li>
			<li><a href="./?action=logout">Deconnexion</a></li>
			<li><?= $_SESSION["nom"]." (Utilisateur)"; ?></li>
		<?php } ?>

		<!-- SECRETAIRE -->
		<?php if ($_SESSION["permission"] == 2){ ?>
			<li><a href="./?action=valide">Valider</a></li>
			<li><a href="./?action=creer">Créer</a></li>
			<li><a href="./?action=suppr">Supprimer</a></li>
			<li><a href="./?action=salle">Salles</a></li>
			<li><a href="./?action=logout">Deconnexion</a></li>
			<li><?= $_SESSION["nom"]." (Secretaire)"; ?></li>
		<?php } ?>

		<!-- RESPONSABLE -->
		<?php if ($_SESSION["permission"] == 3){ ?>
			<li><a href="./?action=creer">Créer</a></li>
			<li><a href="./?action=suppr">Supprimer</a></li>
			<li><a href="./?action=reservation">Reservations</a></li>
			<li><a href="./?action=salle">Salles</a></li>
			<li><a href="./?action=logout">Deconnexion</a></li>
			<li><?= $_SESSION["nom"]." (Responsable)"; ?></li>
		<?php } ?>

		<!-- ADMIN -->
		<?php if ($_SESSION["permission"] == 4){ ?>
			<li><a href="./?action=permission">Permissions</a></li>
			<li><a href="./?action=reservation">Reservations</a></li>
			<li><a href="./?action=salle">Salles</a></li>
			<!-- Mettre le Nom de l'utilisateur ! -->
			<li><a href="./?action=logout">Deconnexion</a></li>
			<li><?= $_SESSION["nom"]." (Adminstrateur)"; ?></li>
		<?php } ?>
	</nav>
<?php } ?>
<br><br>