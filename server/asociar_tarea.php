<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["seleccion_us"])){
		$us = $_POST["seleccion_us"];
		//$id_proyecto = $_SESSION["proyecto"];
		$id_act = $_POST["id_tarea"];
		$id_us = strtok($us, ':');
		//echo $id_us;
		include("system/conect.php");
		
		$query = "UPDATE actividad SET IdUS = $id_us WHERE IdAct = $id_act";
		$result = $mysqli->query($query);
		// se tiene que sacar el tiempo de la actividad, sacar el tiempo real del userstorie, sumarlo y volverlo a meter a us. 
		
		$tiempoact_query = "SELECT TIEMPOESFUERZO FROM actividad WHERE IdAct = $id_act";

		
		$result_tiempoact = $mysqli->query($tiempoact_query);
		$row = $result_tiempoact->fetch_array(MYSQLI_ASSOC);
		$tiempoact = $row["TIEMPOESFUERZO"];
		
		$tiempous_query = "SELECT HORASPLAN FROM userstorie WHERE IdUS = $id_us";

		$result_tiempous = $mysqli->query($tiempous_query);
		$row = $result_tiempous->fetch_array(MYSQLI_ASSOC);
		$tiempous = $row["HORASPLAN"];
		$suma = $tiempoact + $tiempous;
		//update a userstorie

		$query2 = "UPDATE userstorie SET HORASPLAN = $suma WHERE IdUS = $id_us";
		$result2 = $mysqli->query($query2);
		
		header("location: tareas.php");
	} else
	{echo "Error en la consulta asociar_tarea";}

?>