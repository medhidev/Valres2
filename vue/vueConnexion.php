<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Connexion Valres</title>
</head>
<style>
    #connexion{
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%,-50%);
        padding: 20px;
        border: solid 1px;
        border-radius: 10px;
        background-color: #D6E8FE;
    }

    #title_form{
        text-align:center;
    }

    #center_form{
        display: flex;
        justify-content: center;
    }

</style>
<body>
    <!-- Mettre le Nom de l'utilisateur ! -->
    <form action="#" method="post" id="connexion">
        <h3 id="title_form">Connexion</h3><br>

        <input type="mail" name="email" placeholder="email utilisateur" id="input_form" size="30px" required><br><br>

        <input type="password" name="password" placeholder="mot de passe" size="30px" required><br><br>

        <input type="submit" value="connecter" name="connecter">
    </form>
</body>
</html>