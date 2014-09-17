<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["numero_sprint"]) && isset($_POST["dia"]) && isset($_POST["mes"]) && isset($_POST["anno"]) && isset($_POST["dia1"]) && isset($_POST["mes1"]) && isset($_POST["anno1"])) {
		
		$id_proyecto = $_SESSION["proyecto"];
		$numero_sprint = $_POST["numero_sprint"];
		$fecha_inicio = $_POST["anno"].$_POST["mes"].$_POST["dia"];
		$fecha_final = $_POST["anno1"].$_POST["mes1"].$_POST["dia1"];
		
		include("system/conect.php");
		$query = "INSERT INTO sprint (Num_Sprint, IdProyecto, FechaInicios, FechaFinals) values ( $numero_sprint, $id_proyecto, '$fecha_inicio', '$fecha_final')";

		$result = $mysqli->query($query);
		header("location: crear_sprint.php");
	} else
	{echo "Error en query";}

?>