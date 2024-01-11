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
							<select name="etat_select">
								<optgroup label="Etat réservation"></optgroup>
								<option value="1" ><?= $etat[0]["libelle"]; ?></option>
								<option value="2" selected><?= $etat[1]["libelle"]; ?></option>
								<option value="3" ><?= $etat[2]["libelle"]; ?></option>
							</select>
						</td>
					</tr>
				<?php } ?>
				<?php  ?>
			</tbody>
		</table><br>

		<input type="submit" name="edit_reserv" id="edit_reserv" value="Enregister">				
	</form>
</body>
</html>