<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["duracion_sprint"])){
		$duracion = $_POST["duracion_sprint"];
		$id_proyecto = $_SESSION["proyecto"];
		
		include("../system/conect.php");
		
		$query = "UPDATE proyecto SET Duracion_sprint = $duracion WHERE IdProyecto = $id_proyecto";
		$result = $mysqli->query($query);
		header("location: ../html/editar_proyecto.php?id_proyecto=$id_proyecto");
	} else
	{echo "Error en consulta modificar_duracion_sprint";}

?>