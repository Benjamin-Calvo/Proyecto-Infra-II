<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["real"]) && isset($_POST["estado"]) && isset($_POST["id_us"]) && isset($_POST["id_sprint"])){
		
		
		$id_tarea = $_POST["id_tarea"];
		$inversion = $_POST["real"];
		$estado = $_POST["estado"];
		
		$id_us = $_POST["id_us"];
		$id_sprint = $_POST["id_sprint"];

		$dia = $_POST["dia"];
		include("../system/conect.php");
		
		
		
		//hacer que tiempo se sume a la tabla userstorie en el campo HORASTRABAJADAS
		$query = "SELECT TIEMPOESFUERZO, TIEMPOREAL FROM actividad WHERE IdAct = $id_tarea ";
		$result_query = $mysqli->query($query);
		$row = $result_query->fetch_array(MYSQLI_ASSOC);
		$tiempo = $row["TIEMPOESFUERZO"];
		$inversion_sumada = $row["TIEMPOREAL"];
		$sumado = $inversion_sumada + $inversion;
		
		//AQUÍ VAN LOS CAMBIOS A LA TABLA USERSTORIE, AQUÍ ES DONDE SE RESTAN LAS HORAS DE LA ACTIVIDAD A LAS RESTANTES DEL USER STORIE
		if($estado=="T"){
			if ($dia!=""){
				$tiempous_query = "SELECT HORASTRABAJADAS FROM userstorie WHERE IdUS = $id_us";
				$result_tiempous = $mysqli->query($tiempous_query);
				$row = $result_tiempous->fetch_array(MYSQLI_ASSOC);
				$tiempous = $row["HORASTRABAJADAS"];
				$suma = $tiempous + $tiempo;
				$query3 = "UPDATE userstorie SET HORASTRABAJADAS = $suma WHERE IdUS = $id_us";
				$result2 = $mysqli->query($query3);
				//Se actualiza el estado solo si las horas invertidas son diferentes de null
				$query = "UPDATE actividad SET TiempoReal = '$sumado', EstadoAct = '$estado', DiaFinal = '$dia' WHERE IdAct = $id_tarea";
				$result = $mysqli->query($query);
				header("location: ../html/tareas.php?id_us=$id_us&id_sprint=$id_sprint");
			}

			else{
				echo "ERROR: Debe indicar fecha de finalización";
			}	
		}

		else{
			//Se actualiza el estado solo si las horas invertidas son diferentes de null
			$query = "UPDATE actividad SET TiempoReal = '$sumado', EstadoAct = '$estado' WHERE IdAct = $id_tarea";
			$result = $mysqli->query($query);
			header("location: ../html/tareas.php?id_us=$id_us&id_sprint=$id_sprint");
		}
	} 

	else{
		echo "Error en consulta modificar_tarea";
	}
?>