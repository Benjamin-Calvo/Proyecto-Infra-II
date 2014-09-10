<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["nombre_proyecto"]) && isset($_POST["descripcion"])) {
		$nombre_proyecto = $_POST["nombre_proyecto"];
		$descripcion = $_POST["descripcion"];
		include("system/conect.php");
		$query = "INSERT INTO proyecto (nombre, descripcion) values ('$nombre_proyecto', '$descripcion')";
		$result = $mysqli->query($query);
		header("location: index.php");
	} else
	{echo "fvgbhnjm";}

?>