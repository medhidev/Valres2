<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Valres2/vue/css/creer_reservation.css">
    <title>Creer Reservation</title>
</head>
<body>
    <form action="#" method="post" id="form_reservSalle">

        <h3>Fichiers XML</h3>
        liste comptes du <?= date("d/m/Y"); ?>
        <input type="submit" value="Générer XML" name="genere_xml_compte" id="green_btn"><br><br>

        liste reservations du <?= date("d/m/Y"); ?>
        <input type="submit" value="Générer XML" name="genere_xml_reservation" id="green_btn"><br><br>
    </form><br>
</body>
</html>