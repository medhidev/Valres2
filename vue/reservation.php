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
</style>
<body>
    <h1>Page de reservation</h1>
    
    <div id="center">
        <div>
            <!-- Boutton pour actualiser les réservation du client choisi -->
            <form action="" method="post">
                <!-- Liste d'utilisateur dynamique -->
                <select name="listClient" multiple size="10">
                    <?php include __DIR__ . '/../controller/liste_user.php';?>
                </select><br>

                <input type="submit" value="rechercher" style="width: 130px">
            </form>
        </div>

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

                <?php include __DIR__ . '/../controller/liste_reserv.php';?>
            </tbody>
        </table>

        <div style="padding: 30px">
            <!-- A faire ... --> 
            <input type="button" style="width: 40px; height: 40px; background-color: #40ff73; border: 0" onclick="test()" value=" + "><br><br>
            <input type="button" style="width: 40px; height: 40px; background-color: #e60036; border: 0" onclick="test()" value=" - ">
        </div>
    </div>
    <script>
        function test(){
            alert('test');
        }
    </script>

</body>
</html>