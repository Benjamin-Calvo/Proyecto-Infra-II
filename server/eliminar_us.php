<?php
	session_start();
	if (isset($_SESSION["logged_in"])){
		
		$id_us = $_GET["id_us"];
		
		include("system/conect.php");
		$query = "DELETE FROM userstorie WHERE IdUS = $id_us";
		$result = $mysqli->query($query);
		header("location: userstories.php");
	} 
	else
	{echo "fvgbhnjm";}

?>