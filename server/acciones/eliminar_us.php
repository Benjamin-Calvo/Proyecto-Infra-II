<?php
	session_start();
	if (isset($_SESSION["logged_in"])){
		
		$id_us = $_GET["id_us"];
		
		include("../system/conect.php");

		$query = "DELETE FROM actividad WHERE IdUS = $id_us";
		$result = $mysqli->query($query);

		$query = "DELETE FROM criterio WHERE IdUS = $id_us";
		$result = $mysqli->query($query);

		$query = "DELETE FROM userstorie WHERE IdUS = $id_us";
		$result = $mysqli->query($query);
		//echo "string";
		header("location: ../html/userstories.php");
	} 
	else
	{echo "fvgbhnjm";}

?>