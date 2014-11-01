<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["sprint_seleccionado"])){
		$sprint = $_POST["sprint_seleccionado"];
		$id_proyecto = $_SESSION["proyecto"];
		$id_release = $_POST["id_release"];
		$num_sprint = strtok($sprint, ' ');
		$num_sprint = strtok(' ');
		
		include("../system/conect.php");
		
		$query = "UPDATE sprint SET IdRelease = $id_release WHERE num_sprint = $num_sprint AND IdProyecto = $id_proyecto";
		$result = $mysqli->query($query);
		//echo $num_sprint;
		header("location: ../html/asignar_sprint.php?id_release=$id_release");
	} else
	{echo "Error en la consulta asociar_sprint";}

?>