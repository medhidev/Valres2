<?php

include __DIR__ . '/../model/reserv.inc.php';

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
            <button>ajouter</button>
        </td>
        <td>
            <button>provisoire</button>
        </td>
        <td>
            <button>refuser</button>
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