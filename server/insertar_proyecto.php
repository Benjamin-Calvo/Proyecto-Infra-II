<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["nombre_proyecto"]) && isset($_POST["descripcion"]) && isset($_POST["numero_release"]) && isset($_POST["dia"]) && isset($_POST["mes"]) && isset($_POST["anno"]) && isset($_POST["dia1"]) && isset($_POST["mes1"]) && isset($_POST["anno1"])) {
		$nombre_proyecto = $_POST["nombre_proyecto"];
		$descripcion = $_POST["descripcion"];
		$numero_release = $_POST["numero_release"];
		$fecha_inicio = $_POST["anno"].$_POST["mes"].$_POST["dia"];
		$fecha_final = $_POST["anno1"].$_POST["mes1"].$_POST["dia1"];
		
		include("system/conect.php");
		$query = "INSERT INTO proyecto (nombreProyecto, descripcionProyecto,CantidadReleases, FechaInicio, FechaFinal) values ('$nombre_proyecto', '$descripcion', '$numero_release', '$fecha_inicio', '$fecha_final')";
		$query_id = "SELECT Last_insert_id()";
		$result = $mysqli->query($query);
		$result_id = $mysqli->query($query_id);
		$row = $result_id->fetch_array(MYSQLI_ASSOC);
		$id_proyecto = $row["Last_insert_id()"];
		header("location: insertar_release.php?id_proyecto=$id_proyecto&releases=$numero_release");
	} else
	{echo "Error en query";}

?>