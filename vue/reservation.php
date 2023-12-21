<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/logo.png" type="image/png">
    <title>reservation</title>
</head>

<style>
    table, td{
        border: 1px solid;
    }

    #center{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #case{
        padding-left: 20px;
        padding-right: 20px;
        background-color: #e6e1e1;
    }

    #add_reserv{
        width: 40px;
        height: 40px;
        background-color: #40ff73;
        border: 0;
    }

    #del_reserv{
        width: 40px; 
        height: 40px;
        background-color: #e60036;
        border: 0;
    }
</style>
<body>
    <h1>Page de reservation</h1>
    <a href="#">lien vers la liste des salles</a>
    
    <div id="center">
        <div>
            <form action="reservation.php" method="post">

                <!-- Liste d'utilisateur dynamique -->
                <select name="listClient" multiple size="10">
                    <?php include '../controller/liste_user.php';?>
                </select><br>

                <!-- Rechercher les reservations de l'utilisateur -->
                <input type="submit" value="rechercher" style="width: 130px">
            </form>
        </div><br>

        <!-- tableau dynamique -->
        <table name="listReservation" style="background: grey; padding: 5px">
            <thead>
                <tr>
                    <th colspan="5">
                        Liste reservations
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <div style="padding: 20px">
                        <td id="case">
                            nom de salle
                        </td>
                        <td id="case">
                            catégorie
                        </td>
                        <td id="case">
                            etat
                        </td>
                        <td id="case">
                            date
                        </td>
                    </div>
                </tr>
                <?php include '../controller/liste_reserv.php';?>
            </tbody>
        </table>

        <div style="padding: 30px">
            <!-- Ajouter une reservation -->
            <form action="ajouter.php" method="post">
                <input type="submit" id="add_reserv" value=" + "><br><br>
            </form>
            
            <!-- Supprimer une reservation -->
            <form action="supprimer.php" method="post">
                <input type="button" id="del_reserv" value=" - "><br><br>
            </form>
        </div>
    </div>

</body>
</html>