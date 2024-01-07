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

?>
<nav>
	<ul style="list-style-type: none">
		<?php
			if ($_SESSION['permission'] == "utilisateur"){ ?>
				<li><a href="./?action=reservation">Reservations</a></li>
				<li><a href="./?action=salle">Salles</a></li>
				<li><a href="./?action=logout"><?= $_SESSION['utilisateur']; ?></a></li>
			<?php } ?>

			<?php if ($_SESSION['permission'] == "responsable"){ ?>
				<li><a href="./?action=reservation">Reservations</a></li>
				<li><a href="./?action=salle">Salles</a></li>
				<li><a href="./?action=logout"><?= $_SESSION['utilisateur']; ?></a></li>
			<?php } ?>

			<!-- Si l'utilisateur n'est pas encore connecté (on affiche rien) -->
			<?php if ($_SESSION['permission'] == null && $_SESSION['utilisateur'] == null)?>
	</ul>
</nav>