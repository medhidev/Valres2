<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/Valres2/vue/css/reservation.css">
	<title>Page utilisateur</title>
</head>

<body>
	<form action="#" method="POST">
		<div id="search_bar">
			<!-- Selectionner la categorie de la sallle -->
			<select name="categorie_select" required>
				<optgroup label="Categorie Salle"></optgroup>
				<?php for ($i = 0; $i < count($categorie_salle); $i++) { ?>
				<option value='<?= $i+1; ?>'><?= $categorie_salle[$i]["libelle"]; ?></option>
				<?php } ?>
			</select>

			<input type="text" name="structure_select" placeholder="nom structure">

			<input type="date" name="date_select">

			<input type="submit" name="search" id="search_filter" value="rechercher"><br><br>
		</div>
	</form>

	<?php
		// Résultat de recherche
		if (isset($_POST["search"])){
			echo "<div style='color: #26AB5D' id='search_result'>"."<strong>Resultat Recherche :</strong><br><br>";
			echo "Categorie: ".$_POST["categorie_select"]."e option<br>";

			if (empty($_POST["structure_select"])){
				// structure de l'utilisateur
				echo "Structure: (".$_SESSION["structure"].") <br>";
			}

			else{
				echo "Structure: ".$_POST["structure_select"]."<br>";
			}
			echo "Date: ".$_POST["date_select"]."</div><br>";
		}
		?>

	<div id="tableau_reservation">
		<table>
			<thead >
				<th colspan="6">Tableau des réservations en cour</th>
			</thead>
			<tbody>
				<!-- Liste dynamique -->
				<tr>
					<td>
						<strong>Période</strong>
					</td>
					<td>
						<strong>Salle</strong>
					</td>
					<td>
						<strong>Date</strong>
					</td>
					<td>
						<strong>Structure</strong>
					</td>
					<td>
						<strong>Etat</strong>
					</td>
				</tr>

				<?php
				if (isset($_POST["search"])){
					for ($i = 0; $i < count($reservation_select); $i++) { ?>
						<tr>
							<td><?= $reservation_select[$i]["periode"]; ?></td>
							<td><?= $reservation_select[$i]["salle_nom"]; ?></td>
							<td><?php
							$date = new DateTime($reservation_select[$i]["date"]);
							echo $date->format("d/m/Y");
							?></td>
							<td><?= $reservation_select[$i]["structure"]; ?></td>
							<td><?= $reservation_select[$i]["etat"]; ?></td>
						</tr>
				<?php }
				} else {
					for ($i = 0; $i < count($reservation); $i++) { ?>
						<tr>
							<td><?= $reservation[$i]["periode"]; ?></td>
							<td><?= $reservation[$i]["salle_nom"]; ?></td>
							<td><?php
							$date = new DateTime($reservation[$i]["date"]);
							echo $date->format("d/m/Y");
							?></td>
							<td><?= $reservation[$i]["structure"]; ?></td>
							<td><?= $reservation[$i]["etat"]; ?></td>
						</tr>
				<?php }
				} ?>
			</tbody>
		</table>
	</div>
</body>
</html>