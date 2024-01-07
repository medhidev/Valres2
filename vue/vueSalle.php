<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Salle</title>
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
</style>
<body>
	<form action="#" method="post">
		<!-- Selectionner la categorie de la sallle -->
		<select name="categorie_select" required>
			<optgroup label="Categorie Salle"></optgroup>
			<?php for ($i = 0; $i < count($categorie_salle); $i++) { ?>
			<option value='<?= $i+1; ?>'><?= $categorie_salle[$i]["libelle"]; ?></option>
			<?php } ?>
		</select>

		<!-- revoir cette partie avec la date -->
		<input type="date">
	
		<input type="submit" value="Filtrer">

	</form>

    <table id="salle">
		<thead >
			<th colspan="6">Salles de Valres</th>
		</thead>
		<tbody>
			<!-- Liste dynamique -->
			<tr>
				<td>
					<strong>Nom Salle</strong>
				</td>
				<td>
					<strong>Categorie</strong>
				</td>
			</tr>
            <?php for ($i = 0; $i < count($salle); $i++) { ?>
                <tr>
					<td><?= $salle[$i]["salle_nom"]; ?></td>
					<td><?= $salle[$i]["libelle"]; ?></td>
				</tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>