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
</style>

<body>
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
						$date = new DateTime($reservation[$i]["date"]);
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
						<td>
                            <form action="#" method="post" id="form_etat_select">
                                <label><input type="radio" name="etat_select" id="etat_select"> Valider</label>
                                <label><input type="radio" name="etat_select" id="etat_select"> Provisoire</label>
                                <label><input type="radio" name="etat_select" id="etat_select"> Annuler</label>
                            </form>
                        </td>
					</tr>
			<?php }
			} ?>
		</tbody>
	</table>
</body>
</html>