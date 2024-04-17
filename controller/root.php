<?php

session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Appel répétitif
include "$racine/model/bdd.inc.php";
include "$racine/model/message_system.inc.php"

?>