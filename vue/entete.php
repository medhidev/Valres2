<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

?>

<?php
if ($_SESSION["permission"] == null && $_SESSION["id"] == null){}
else { ?>
	<nav>
		<!-- UTILISATEUR -->
		<?php if ($_SESSION["permission"] == 1){ ?>
			<li><?= "Utilisateur: <strong>".$_SESSION["nom"]."</strong>"; ?></li>
			<li><a href="./?action=reservation">Reservations</a></li>
		<?php } ?>

		<!-- SECRETAIRE -->
		<?php if ($_SESSION["permission"] == 2){ ?>
			<li><?= "Secretaire: <strong>".$_SESSION["nom"]."</strong>"; ?></li>
			<li><a href="./?action=valide">Valider</a></li>
			<li><a href="./?action=creer">Créer</a></li>
			<li><a href="./?action=suppr">Supprimer</a></li>
			<li><a href="./?action=xml">XML</a></li>
		<?php } ?>

		<!-- RESPONSABLE -->
		<?php if ($_SESSION["permission"] == 3){ ?>
			<li><?= "Responsable: <strong>".$_SESSION["nom"]."</strong>"; ?></li>
			<li><a href="./?action=creer">Créer</a></li>
			<li><a href="./?action=suppr">Supprimer</a></li>
			<li><a href="./?action=reservation">Reservations</a></li>
		<?php } ?>

		<li><a href="./?action=salle">Salles</a></li>
		<li><a href="./?action=logout">Deconnexion</a></li>
	</nav>
<?php } ?>

<!-- Permet d'espacer la nav -->
<br><br><br><br>