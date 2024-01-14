<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dependance -->
    <script src="https://kit.fontawesome.com/7aec2fa477.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Valres2/vue/css/root.css">
    <link rel="stylesheet" href="/Valres2/vue/css/connexion.css">

    <title>Connexion Valres</title>
</head>

<body>
    <!-- Mettre le Nom de l'utilisateur ! -->

    <form action="#" method="post" id="connexion">
        <h2 id="title_form">Connexion</h2><br>

        <span id="icon"><i class="fa fa-at"></i></span>
        <input type="mail" name="email" placeholder="email utilisateur" id="input_form" size=30% required><br><br>

        <span id="icon"><i class="fas fa-lock"></i></span>
        <input type="password" name="password" placeholder="mot de passe" size=30% required><br><br>

        <div id="btn_position">
            <input type="submit" value="connecter" name="connecter" id="connexion_btn">
        </div>
    </form>
</body>
</html>