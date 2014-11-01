<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["numero_sprint"]) && isset($_POST["dia"]) && isset($_POST["mes"]) && isset($_POST["anno"]) && isset($_POST["dia1"]) && isset($_POST["mes1"]) && isset($_POST["anno1"])){
		
		$id_proyecto = $_SESSION["proyecto"];
		$id_sprint = $_POST["id_sprint"];
		$numero_sprint = $_POST["numero_sprint"];
		$fecha_inicio = $_POST["anno"].$_POST["mes"].$_POST["dia"];
		$fecha_final = $_POST["anno1"].$_POST["mes1"].$_POST["dia1"];
		$id_release = $_POST["id_release"];
		
		include("../system/conect.php");
		
		$query = "UPDATE sprint SET Num_Sprint = $numero_sprint, FechaInicioS = $fecha_inicio, FechaFinalS = $fecha_final WHERE IdProyecto = $id_proyecto";
		$result = $mysqli->query($query);
		header("location: ../html/sprints.php?id_release=$id_release");
	} else
	{echo "Error en consulta modificar_sprint";}

?>