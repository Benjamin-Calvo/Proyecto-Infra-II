<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["descripcion"]) && isset($_POST["esfuerzo"]) && isset($_POST["idus"]) && isset($_POST["id_sprint"])) {

		$id_proyecto = $_SESSION["proyecto"];
		$descripcion = $_POST["descripcion"];
		$esfuerzo = $_POST["esfuerzo"];
		
		$idus = $_POST["idus"];
		$id_sprint = $_POST["id_sprint"];
		
		include("../system/conect.php");

		$query = "INSERT INTO actividad (DescripcionAct, TiempoEsfuerzo, IdUS) values ('$descripcion', '$esfuerzo', $idus)";
		$result = $mysqli->query($query);
		
		$tiempous_query = "SELECT HORASPLAN FROM userstorie WHERE IdUS = $idus";

		$result_tiempous = $mysqli->query($tiempous_query);
		$row = $result_tiempous->fetch_array(MYSQLI_ASSOC);
		$tiempous = $row["HORASPLAN"];
		$suma = $esfuerzo + $tiempous;
		//update a userstorie

		$query2 = "UPDATE userstorie SET HORASPLAN = $suma WHERE IdUS = $idus";
		$result2 = $mysqli->query($query2);

		header("location: ../html/crear_tarea.php?idus=$idus&id_sprint=$id_sprint");
	} else
	{echo "Error en la consulta insertar_tarea";}

?>