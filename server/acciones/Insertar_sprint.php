<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["numero_sprint"]) && isset($_POST["dia"]) && isset($_POST["mes"]) && isset($_POST["anno"]) && isset($_POST["dia1"]) && isset($_POST["mes1"]) && isset($_POST["anno1"])) {
		
		$id_proyecto = $_SESSION["proyecto"];
		$numero_sprint = $_POST["numero_sprint"];
		$fecha_inicio = $_POST["anno"].$_POST["mes"].$_POST["dia"];
		$fecha_final = $_POST["anno1"].$_POST["mes1"].$_POST["dia1"];
		$dias_habiles = $_POST["dias_habiles"];

		include("../system/conect.php");

		$query2 = "SELECT Duracion_Sprint from  proyecto where idproyecto = '$id_proyecto' ";
		$result_query2 = $mysqli->query($query2);
		$row = $result_query2->fetch_array(MYSQLI_ASSOC);
		$Semanas_por_Sprint = $row["Duracion_Sprint"];
		$multiplicacion = $Semanas_por_Sprint * $dias_habiles;

		
		

		$query = "INSERT INTO sprint (Num_Sprint, IdProyecto, FechaInicios, FechaFinals, diashabiles) values ( $numero_sprint, $id_proyecto, '$fecha_inicio', '$fecha_final', $multiplicacion)";
		$result = $mysqli->query($query);
		header("location: ../html/crear_sprint.php");
	} else
	{echo "Error en query en insertar_sprint";}

?>