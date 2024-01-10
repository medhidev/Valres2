<?php 

// Vérifie qu'un compte soit présent dans la base de donnée
function getInfo($login, $mdp){
    
    // script de connexion à la BDD à compléter
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT * FROM Utilisateur WHERE mail = '$login' AND mdp = '$mdp'";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();
        $result = $row;

    } catch (Exception $e){
        die("Erreur de connexion: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}


// Permet de récupérer les permission d'un utilisateur
function getUsersWithPermissions() {
    $result = array();

    try {
        $connexion = connexionBDD();
        $req_sql = "SELECT utilisateur_id, utilisateur.nom, utilisateur.prenom, permissions.libelle_perm 
        FROM utilisateur 
        LEFT JOIN permissions ON utilisateur.id_perm = permissions.id_perm";

        $request = $connexion->query($req_sql);
        $row = $request->fetch();

        while ($row){
            $result[] = $row;
            $row = $request->fetch();
        }


    } catch (Exception $e){
        die("Erreur: ".$e->getMessage());
    }

    // renvoie la liste des reservations
    return $result;
}

function renderUserTable($users) {
    if (!isset($users) || empty($users)) {
        echo '<div class="alert alert-warning" role="alert">Aucun utilisateur à afficher.</div>';
    } else {
        echo '<div class="container mt-4">';
        echo '<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#nouvelUtilisateurModal"> Ajouter un nouvel utilisateur </button>';
        echo '<table class="table">';
        echo '<thead><tr><th>Nom Prénom</th><th>Permission</th><th>Actions</th></tr></thead>';
        echo '<tbody>';
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['nom']} {$user['prenom']}</td>";
            echo "<td>{$user['libelle_perm']}</td>";
            echo '<td>';
            echo "<button class=\"btn btn-primary btn-sm\" onclick=\"openPopup('{$user['nom']}', '{$user['prenom']}')\">Modifier</button> ";
            echo "<button class=\"btn btn-danger btn-sm\" onclick=\"ouvrirConfirmationSuppression('{$user['utilisateur_id']}')\">Supprimer</button>";
            echo '</td>';
            echo "</tr>";
        }
        echo '</tbody></table></div>';
    }
}


?>