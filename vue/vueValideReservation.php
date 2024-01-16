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
				<th colspan="6">Tableau des réservations en cours</th>
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
					<td colspan="2">
						<strong>Etat</strong>
					</td>
				</tr>

				<?php
				$y=0;
				for ($i = 0; $i < count($reservation); $i++) { ?>
					<tr>
						<td><?= $reservation[$i]["periode"]; ?></td>
						<td><?= $reservation[$i]["salle_nom"]; ?></td>
						<td><?php
						$date = new DateTime($reservation[$i]["date"]);
						echo $date->format("d/m/Y");
						?></td>
						<td><?= $reservation[$i]["structure"]; ?></td>
						<td><?= "<strong>".$reservation[$i]["etat"]."</strong>"; ?></td>
						<td>
							<!-- Pas réussis liste totalement dynamique -->
							<select name=<?= "etat_select".$i+1; ?>>
								<optgroup label="Etat réservation"></optgroup>
								<option value="1" ><?= $etat[0]["libelle"]; ?></option>
								<option value="2" selected><?= $etat[1]["libelle"]; ?></option>
								<option value="3" ><?= $etat[2]["libelle"]; ?></option>
							</select>
						</td>
					</tr>
				<?php
					// $y++;
				} ?>
				<?php  ?>
			</tbody>
		</table><br>

		<input type="submit" name="edit_reserv" id="edit_reserv" value="Enregister" style="background-color: #08c252; border: none; padding: 10px; border-radius: 5px;">
					
	</form>
</body>
</html>