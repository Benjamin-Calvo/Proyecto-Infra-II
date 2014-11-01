<?php
	session_start();
	if (isset($_SESSION["logged_in"])){
		
		$id_us = $_GET["id_us"];
		$id_sprint = $_GET["id_sprint"];
		
		include("../system/conect.php");
		
		$query = "UPDATE userstorie SET IdSprint = null WHERE IdUS = $id_us";
		$result = $mysqli->query($query);
		header("location: ../html/us_sprint.php?id_sprint=$id_sprint");
	} 
	else
	{echo "fvgbhnjm";}

?>
