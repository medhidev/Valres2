<?php

include "root.php";

if ($_SESSION["permission"] == 2){

    /* Modele */
    include "$racine/model/reservation.inc.php";

    if (isset($_POST["genere_xml"])){

        // Création d'un nouvel objet DOMDocument
        $doc = new DOMDocument('1.0', 'utf-8');
        $doc->formatOutput = true;

        // Ajout du commentaire
        $comment = $doc->createComment("Généré le : ".date('D j M Y \à H:i'));
        $doc->appendChild($comment);

        // Création de l'élément racine <reservations>
        $reservations = $doc->createElement('reservations');
        $doc->appendChild($reservations);

        // Tableau des réservations
        $reservationsData = getReservation();

        // Ajout des réservations
        foreach ($reservationsData as $reservationData) {
            $reservation = $doc->createElement('reservation');
            $reservation->setAttribute('id_reserv', $reservationData['id_reserv']);

            // Ajoute tout les éléments enfants dans le document
            foreach ($reservationData as $key => $value) {
                if ($key != 'id_reserv' && is_string($key)) {
                    $value = htmlspecialchars($value, ENT_XML1, 'UTF-8');
                    $element = $doc->createElement($key, $value);
                    $reservation->appendChild($element);
                }
            }

            $reservations->appendChild($reservation);
        }

        // Sauvegarde du document XML dans un fichier (Télécharger)
        $doc->save('reservations.xml');

        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="reservations.xml"');
        readfile('reservations.xml');
        exit;

        echo sendValide('Fichier XML généré avec succès');

    }

    /* Vue */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueXML.php";
}
?>
