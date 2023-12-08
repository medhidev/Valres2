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
        <!-- Liste d'utilisateur dynamique -->
        <select name="">
            <option>client 1</option>
            <option>client 2</option>
            <option>client 3</option>
            <option>client 4</option>
            <option>client 5</option>
        </select>

        <!-- tableau dynamique -->
        <table>
            <thead>
                <tr>
                    <th colspan="4">
                        Liste reservations
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        nom de la reservation
                    </td>
                    <td>
                        <button>ajouter</button>
                    </td>
                    <td>
                        <button>provisoire</button>
                    </td>
                    <td>
                        <button>supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>