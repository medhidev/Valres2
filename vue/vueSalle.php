<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/Valres2/vue/css/salle.css">
    <title>Page Salle</title>
</head>
<body>
    <table id="salle">
		<thead >
			<th colspan="3">Salles de Valres</th>
		</thead>
		<tbody>
			<!-- Liste dynamique -->
			<tr>
				<td>
					<strong>Nom Salles</strong>
				</td>
				<td>
					<strong>Categories</strong>
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