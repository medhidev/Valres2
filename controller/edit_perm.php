<?php

include "root.php";

if ($_SESSION["permission"] == 4){
    /* Model Permission*/
    include "$racine/model/message_system.inc.php";
    include "$racine/model/utilisateur.inc.php";

    $users = getUsersWithPermissions();
    renderUserTable($users);

    /* Vue Permission */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueModal.php";
    include "$racine/vue/vueModifPermission.php";

}
else {
    header("Location: ./?action=login");
}

?>