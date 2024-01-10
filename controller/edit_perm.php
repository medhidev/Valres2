<?php

session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

if ($_SESSION["permission"] == 4){
    /* Model Permission*/
    include "$racine/model/message_system.inc.php";

    /* Vue Permission */
    include "$racine/vue/entete.php";
    include "$racine/vue/vueModifPermission.php";

    // Script
}
else {
    header("Location: ./?action=login");
}

?>