<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dependance -->
    <script src="https://kit.fontawesome.com/7aec2fa477.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Valres2/vue/css/connexion.css">

    <title>Connexion Valres</title>
</head>

<body>

    <form action="#" method="post" id="connexion">
        <h2 id="title_form">Créer un compte</h2><br>

        <!-- Nom / Prénom -->
        <span id="icon"><i class="fa-solid fa-user"></i></span>
        <input type="text" name="nom" placeholder="nom" id="input_form" required>
        <input type="text" name="prenom" placeholder="prenom" id="input_form" required><br><br>

        <!-- Nom / Type de structure -->
        <span id="icon"><i class="fa-solid fa-landmark"></i></span>
        <input type="text" name="nom_structure" placeholder="nom structure" id="input_form" required>
        <!-- Faire un select -->
        <select name="type_structure" required>
            <optgroup label="Categorie Salle"></optgroup>
			<?php for ($i = 0; $i < count($structure); $i++) { ?>
			<option value='<?= $i+1; ?>'><?= $structure[$i]["libelle"]; ?></option>
			<?php } ?>
        </select><br><br>

         <!-- Adresse Structure -->
         <span id="icon"><i class="fa-solid fa-location-dot"></i></span>
        <input type="text" name="adresse" placeholder="adresse structure" id="input_form" size=46% required><br><br>

        <!-- Email -->
        <span id="icon"><i class="fa fa-at"></i></span>
        <input type="mail" name="email" placeholder="email utilisateur" id="input_form" size=46% required><br><br>

        <!-- Mot de passe -->
        <span id="icon"><i class="fas fa-lock"></i></span>
        <input type="password" name="password" placeholder="mot de passe" size=46% required><br><br>

        <a href="./?action=login">-> Retour Accueil</a>

        <div id="btn_position">
            <input type="submit" value="s'enregistrer" name="register" id="green_btn">
        </div>
    </form>
</body>
</html>