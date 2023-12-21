<form action="add_reserv.php" method="post">
    <input type="text" name="nom_cli" value="nomxxxx" disabled> <input type="text" name="prenom_cli" value="prenomxxxx" disabled><br><br>

    <strong>Salle disponible</strong><br>
    <select name="liste_salle">
        <option>liste dynamique (salle)</option>
    </select><br><br>

    <select name="liste_categ">
        <option>liste dynamique (categorie salle)</option>
    </select><br><br>
    <input type="date" name="date reserv" placeholder="date"><br><br>

    <input type="submit" value="Créer">
</form>