<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Reservation</title>
</head>
<style>
    #form_reservSalle{
        position: absolute;
        padding: 20px;
        border: solid 1px;
        border-radius: 10px;
        background-color: #D6E8FE;
    }
</style>
<body>
    <form action="#" method="post" id="form_reservSalle">

        <h3>Réserver une Salle</h3>

        <!-- Selectionner la salle -->
		<select name="salle_select" required>
			<optgroup label="Liste des Salles"></optgroup>
			<?php for ($i = 0; $i < count($salle); $i++) { ?>
			<option value='<?= $i+1; ?>'><?= $salle[$i]["salle_nom"]; ?></option>
			<?php } ?>
		</select><br><br>

        <!-- La date de reservation -->
        <input type="date" name="date_select" required>
        
        <!-- La période -->
        <select name="periode_select" required style="width: 100px; text-align: center;">
			<optgroup label="Les Périodes"></optgroup>
			<?php for ($i = 0; $i < count($periode); $i++) { ?>
			<option value='<?= $i+1; ?>'><?= $periode[$i]["libelle"]; ?></option>
			<?php } ?>
		</select><br><br>

        <input type="submit" value="Créer" name="add_reserv">
    </form>
</body>
</html>