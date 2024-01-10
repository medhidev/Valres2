<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valider Reservation</title>
</head>

<style>
	td, th{
		border: 1px solid;
		text-align: center;
		padding: 8px;
	}

	th {
		padding: 10px;padding-left: 20px;padding-right: 20px;
	}

    #etat_select{
        padding-left: 10px;
    }

    /* Aligner les éléments */
    #form_etat_select {
      display: flex;
      flex-direction: column;
    }

    label {
      display: flex;
      align-items: baseline;
    }

	#edit_reserv {
		width: 100px;
		padding: 10px;
	}
</style>

<body>
	<form action="#" method="post" id="form_etat_select">	
		<table id="reservations">
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
					<td colspan="2">
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
							<td><?= "<strong>".$reservation[$i]["etat"]."</strong>"; ?></td>
							<td>
								<input type="button" name=<?= "valide".$i; ?> value="Valider"><br>
								<input type="button" name=<?= "provisoire".$i; ?> value="Provisoire"><br>
								<input type="button" name=<?= "annuler".$i; ?> value="Annuler">
							</td>
						</tr>
				<?php }
				} ?>
			</tbody>
		</table><br>

		<input type="button" name="edit_reserv" id="edit_reserv" value="Enregister">				
	</form>
</body>
</html>