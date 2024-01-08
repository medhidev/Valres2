<style>
	body{
		font-family: arial;
	}

	li {
		display: inline-block;
	}

	a{
		margin-right: 10px;
		text-decoration: none;
		color: #1E90FF
	}

	input:focus{
        /* border: none; */
        outline: none;
    }
</style>

<?php

// session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// if (!empty($_SESSION["id"])){
// 	$_SESSION["id"] = null;
// 	$_SESSION["permission"] = null;
// 	$_SESSION["nom"] = null;
// }
// else{
// 	echo "ID: ".$_SESSION["permission"]."<br>";
// 	echo "Perm: ".$_SESSION["permission"]."<br>";
// 	echo $_SESSION["nom"];
// }

?>
