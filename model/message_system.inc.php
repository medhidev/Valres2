<?php

// Pattern d'erreur (pour éviter de répéter des messages erreurs)
function sendError($message){
    return "<strong style='color: #BF3030;'> ERREUR : ".$message."</strong>";
}

// Pattern d'erreur (pour éviter de répéter des messages erreurs)
function sendValide($message){
    return "<strong style='color: #11933E;'>".$message."</strong>";
}

// Pattern d'erreur (pour éviter de répéter des messages erreurs)
function sendWarn($message){
    return "<strong style='color: #FF9900;'>".$message."</strong>";
}
?>