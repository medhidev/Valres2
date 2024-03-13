<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/Valres2/vue/css/valide_reservation.css">
    <title>Valider Reservation</title>
</head>

<body>
	<form action="#" method="post" id="form_etat_select">	
		<table id="reservations">
			<thead >
				<th colspan="7">Tableau des réservations en cours</th>
			</thead>
			<tbody>
				<!-- Liste dynamique -->
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>Période</strong></td>
					<td><strong>Salle</strong></td>
					<td><strong>Date</strong></td>
					<td><strong>Structure</strong></td>
					<td colspan="2"><strong>Etat</strong></td>
				</tr>

				<?php
				for ($i = 0; $i < count($reservation); $i++) { ?>
					<tr>
						<td><?= $reservation[$i]["id_reserv"]; ?></td>
						<td><?= $reservation[$i]["periode"]; ?></td>
						<td name="salle <?=$i?>"><?= $reservation[$i]["salle_nom"]; ?></td>
						<td>
							<?php
							$date = new DateTime($reservation[$i]["date"]);
							echo $date->format("d/m/Y");
							?>
						</td>
						<td><?= $reservation[$i]["structure"]; ?></td>
						<td><?= "<strong>".$reservation[$i]["etat"]."</strong>"; ?></td>
						<td>
							<input type="radio" name="confirm_<?= $reservation[$i]["id_reserv"]; ?>"> <?= $etat[0]["libelle"]; ?>
							<input type="radio" name="proviso_<?= $reservation[$i]["id_reserv"]; ?>"> <?= $etat[1]["libelle"]; ?>
							<input type="radio" name="annuler_<?= $reservation[$i]["id_reserv"]; ?>"> <?= $etat[2]["libelle"]; ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table><br>

		<input type="submit" name="edit_reserv" id="green_btn" value="Enregister" style="margin-right: 90%;">
					
	</form>
</body>
</html>