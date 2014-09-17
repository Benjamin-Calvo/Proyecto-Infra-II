<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["descripcion"]) && isset($_POST["prioridad"]) && isset($_POST["puntos"])) {

		$id_proyecto = $_SESSION["proyecto"];
		$descripcion = $_POST["descripcion"];
		$prioridad = $_POST["prioridad"];
		$puntos = $_POST["puntos"];
		
		include("system/conect.php");

		$query = "INSERT INTO userstorie (IdProyecto, DescripcionUs, Prioridad, PuntosUs) values ('$id_proyecto', '$descripcion', '$prioridad', '$puntos')";
		$result = $mysqli->query($query);
		header("location: crear_us.php");
	} else
	{echo "fvgbhnjm";}

?>