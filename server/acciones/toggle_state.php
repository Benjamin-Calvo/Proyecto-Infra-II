<?php
	session_start();
	if (!isset($_SESSION["logged_in"])) {
	header("location: system/login.php");
	} else {
	  	$estado = $_GET["state"];
	  	$id_criterio = $_GET["id"];

		include("../system/conect.php");
		if ($estado=="true") {
			$query = "UPDATE criterio SET estadoCriterio = '1' WHERE idCriterio = ". $id_criterio; 
		} else {
			$query = "UPDATE criterio SET estadoCriterio = '0' WHERE idCriterio = ". $id_criterio; 
		}
		$result = $mysqli->query($query);
		if ($result) {
			echo ("ok"); 
		} else {
			echo "ERROR";
		}
	}
?>