<?php
	session_start();
	if (isset($_SESSION["logged_in"])){
		
		$id_tarea = $_GET["id_tarea"];
		$id_us = $_GET["id_us"];
  		$id_sprint = $_GET["id_sprint"];
		
		include("../system/conect.php");
		
		$query2 = "SELECT IDUS, ESTADOACT FROM actividad WHERE IdAct = $id_tarea ";
		$result_query2 = $mysqli->query($query2);
		$row = $result_query2->fetch_array(MYSQLI_ASSOC);
		$idus = $row["IDUS"];
		$estado = $row["ESTADOACT"];
		
		if ($estado != "T")		//Se trae el tiempo de esfuerzo de la tarea eliminada
		{	
			$tiempoact_query = "SELECT TIEMPOESFUERZO FROM actividad WHERE IdAct = $id_tarea";
		
			$result_tiempoact = $mysqli->query($tiempoact_query);
			$row = $result_tiempoact->fetch_array(MYSQLI_ASSOC);
			$tiempoact = $row["TIEMPOESFUERZO"];


			$tiempous_query = "SELECT HORASPLAN FROM userstorie WHERE IdUS = $idus";

			$result_tiempous = $mysqli->query($tiempous_query);
			$row = $result_tiempous->fetch_array(MYSQLI_ASSOC);
			$tiempous = $row["HORASPLAN"];

			$resta = $tiempous - $tiempoact;
			//update a userstorie para la resta de horas

			$query3 = "UPDATE userstorie SET HORASPLAN = $resta WHERE IdUS = $idus";
			$result2 = $mysqli->query($query3);

			$borrar = "DELETE FROM actividad WHERE IdAct = $id_tarea";
			$result = $mysqli->query($borrar);
			
			header("location: ../html/tareas.php?id_us=$id_us&id_sprint=$id_sprint");
		}

		else {
			echo "No se puede borrar una tarea terminada :p";
		}
	} 
	else
	{echo "Error en consulta eliminar_tarea";}

?>