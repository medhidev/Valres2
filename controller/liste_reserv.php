<?php

include __DIR__ . '/../model/reserv.inc.php';

$i = 1;
while($row_user != false){
    $nom = $row_user["nom"];
    $prenom = $row_user["prenom"];

    // Affichage des utilisateurs
    echo "<option value='".$i."'>".strtolower($nom)." ".strtolower($prenom)."</option>";
    $row_user = $connect_user->fetch();
    $i++;
}

// <tr>
//                     <td>
//                         salle_nom date(D/M/Y) 
//                     </td>
//                     <td>
//                         <form action="" method="post">
//                             <input type="submit" value="ajouter">
//                         </form>
//                     </td>
//                     <td>
//                         <button>provisoire</button>
//                     </td>
//                     <td>
//                         <button>refuser</button>
//                     </td>
//                     <td>
//                         <input type="checkbox" name="delcheck">
//                     </td>
//                 </tr>

?>