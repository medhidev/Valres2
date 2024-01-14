<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

?>

<!-- NAV BAR -->
<link rel="stylesheet" href="/Valres2/vue/css/root.css">

<?php
if ($_SESSION["permission"] == null && $_SESSION["id"] == null){}
else { ?>
	<nav>
		<!-- UTILISATEUR -->
		<?php if ($_SESSION["permission"] == 1){ ?>
			<li><a href="./?action=reservation">Reservations</a></li>
			<li><a href="./?action=salle">Salles</a></li>
			<li><?= "Utilisateur: <strong>".$_SESSION["nom"]."</strong>"; ?></li>
			<li><a href="./?action=logout">Deconnexion</a></li>
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