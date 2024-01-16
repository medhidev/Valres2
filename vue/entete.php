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
			<li><?= "Utilisateur: <strong>".$_SESSION["nom"]."</strong>"; ?></li>
		<?php } ?>

		<!-- SECRETAIRE -->
		<?php if ($_SESSION["permission"] == 2){ ?>
			<li><?= $_SESSION["nom"]." (Secretaire)"; ?></li>
			<li><a href="./?action=valide">Valider</a></li>
			<li><a href="./?action=creer">Créer</a></li>
			<li><a href="./?action=suppr">Supprimer</a></li>
			<li><a href="./?action=xml">XML</a></li>
		<?php } ?>

		<!-- RESPONSABLE -->
		<?php if ($_SESSION["permission"] == 3){ ?>
			<li><?= $_SESSION["nom"]." (Responsable)"; ?></li>
			<li><a href="./?action=creer">Créer</a></li>
			<li><a href="./?action=suppr">Supprimer</a></li>
		<?php } ?>

		<!-- ADMIN -->
		<?php if ($_SESSION["permission"] == 4){ ?>
			<li><?= $_SESSION["nom"]." (Adminstrateur)"; ?></li>
			<li><a href="./?action=permission">Permissions</a></li>
		<?php } ?>

		<li><a href="./?action=reservation">Reservations</a></li>
		<li><a href="./?action=salle">Salles</a></li>
		<li><a href="./?action=logout">Deconnexion</a></li>
	</nav>
<?php } ?>
<br><br>