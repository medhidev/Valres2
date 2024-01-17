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

        <h3>Supprimer ma Reservation</h3>

        <!-- Selectionner la salle -->
		<select name="salle_select" id="liste_reservation" required>
			<optgroup label="Nom Salle"></optgroup>
			<?php for ($i = 0; $i < count($salle); $i++) { ?>
                <option value='<?= $i+1; ?>'><?= $salle[$i]["salle_nom"]; ?></option>
			<?php } ?>
		</select>

        <!-- Selectionner la période -->
        <select name="periode_select" id="liste_reservation" required>
			<optgroup label="Période"></optgroup>
			<?php for ($i = 0; $i < count($periode); $i++) { ?>
                <option value='<?= $i+1; ?>'><?= $periode[$i]["libelle"]; ?></option>
			<?php } ?>
		</select><br><br>

        <!-- Selectionner la date -->
        <input type="date" name="date_select" required><br><br>

        <!-- Supprimer -->
        <input type="submit" value="Supprimer" name="suppr_reserv" id="red_btn">
    </form>
</body>
</html>