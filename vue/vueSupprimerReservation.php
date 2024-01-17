<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Valres2/vue/css/root.css">
    <link rel="stylesheet" href="/Valres2/vue/css/creer_reservation.css">
    <title>Supprimer Reservation</title>
</head>
<body>
    <form action="#" method="post" id="form_reservSalle">

        <h3>Supprimer une Reservation</h3>

        <!-- Selectionner la salle -->
		<select name="reservation_select" id="liste_reservation" multiple required>
			<optgroup label="Liste des Reservation effectués"></optgroup>
			<?php for ($i = 0; $i < count($reservation); $i++) { ?>
                <option value='<?= $i+1; ?>'>
                <?php
                    $date = new DateTime($reservation[$i]["date"]);
                    echo "Reservation ".($i+1)." - ".$date->format("d/m/Y");
                ?>
            </option>
			<?php } ?>
		</select><br><br>

        <input type="submit" value="Supprimer" name="suppr_reserv" id="red_btn">
    </form>
</body>
</html>