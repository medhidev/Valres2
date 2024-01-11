<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Reservation</title>
</head>
<style>
    #form_reservSalle{
        position: absolute;
        padding: 20px;
        border: solid 1px;
        border-radius: 10px;
        background-color: #D6E8FE;
    }

    #liste_reservation {
        width: 280px;
    }
</style>
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

        <input type="submit" value="Supprimer" name="suppr_reserv" style="background-color: #fc3a41; border: none; padding: 10px; border-radius: 5px;">
    </form>
</body>
</html>