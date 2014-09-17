<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["descripcion"]) && isset($_POST["prioridad"]) && isset($_POST["puntos"])){
		
		$id_us = $_POST["idUS"];
		$descripcion = $_POST["descripcion"];
		$prioridad = $_POST["prioridad"];
		$puntos = $_POST["puntos"];
		
		include("system/conect.php");
		$query = "UPDATE userstorie SET DescripcionUS = '$descripcion', Prioridad = $prioridad, PuntosUS = $puntos WHERE IdUS = $id_us";
		$result = $mysqli->query($query);
		header("location: userstories.php");
	} 
	else
	{echo "fvgbhnjm";}

?>