<?php

 include '../model/reserv.inc.php';

$i = 1;
while($row_reserv != false){
    $nom_salle = $row_reserv["salle_nom"];
    $categorie = $row_reserv["categorie"];
    $etat = $row_reserv["etat"];
    $Longdate = new DateTime($row_reserv["date"]);
    $date = $Longdate->format('d-m-Y');

    // Affichage des utilisateurs
    echo "
    <tr>
        <td>".$nom_salle."</td>
        <td>".$categorie."</td>
        <td>".$etat."</td>
        <td>".$date."</td>
        <td>
            <form action='model/etat/valide.inc.php' method='post'>
                <input type='submit' value='valide'>
            </form>
        </td>
        <td>
            <form action='model/etat/provisoire.inc.php' method='post'>
                <input type='submit' value='provisoire'>
            </form>
        </td>
        <td>
            <form action='model/etat/annule.inc.php' method='post'>
                <input type='submit' value='annule'>
            </form>
        </td>
        <td>
            <input type='checkbox' name='delcheck'>
        </td>
    </tr>
    ";
    $row_reserv = $connect_reserv->fetch();

    $i++;
}

?>