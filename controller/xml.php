<?php

include "root.php";

if ($_SESSION["permission"] == 2){

    /* Modele */
    if (isset($_POST["genere_xml"])){
        // Créez un document XML
        $doc = new DOMDocument('1.0', 'utf-8');

        // Créez la racine de votre document
        $root = $doc->createElement('root');
        $doc->appendChild($root);

        // Ajout des éléments du document
        // 
        $element1 = $doc->createElement('element1', 'Valeur de l\'élément 1');
        $root->appendChild($element1);

        $element2 = $doc->createElement('element2', 'Valeur de l\'élément 2');
        $root->appendChild($element2);

        // Créez le fichier XML
        $doc->formatOutput = true; // pour formater le fichier XML de manière lisible
        $xmlString = $doc->saveXML();

        // Enregistrez le fichier XML dans un fichier
        header('Content-Type: text/xml');
        header('Content-Disposition: attachment; filename="liste_utilisateur.xml"');

        echo sendValide("Fichier XML généré avec succès");
    }

    /* Vue */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueXML.php";
}
?>
