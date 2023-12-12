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
        <table name="listReservation">
            <thead>
                <tr>
                    <th colspan="5">
                        Liste reservations
                    </th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <div>
            <!-- A faire ... -->  
            <button style="width: 40px; height: 40px"> + </button><br>
            <button style="width: 40px; height: 40px"> - </button>
        </div>
    </div>
    
</body>
</html>