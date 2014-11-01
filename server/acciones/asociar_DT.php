<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["usuario_seleccionado"]) && isset($_POST["id_us"]) && isset($_POST["id_sprint"])) {
		
		$id_us = $_POST["id_us"];
		$id_sprint = $_POST["id_sprint"];
		$usuario = $_POST["usuario_seleccionado"];
		$id_usuario = strtok($usuario, ':');


		include("../system/conect.php");

		$query = "UPDATE userstorie set IdMiembro ='$id_usuario' where IdUS = $id_us";
		$result = $mysqli->query($query);
		
		header("location: ../html/us_sprint.php?id_sprint=$id_sprint");
	} else
	
	{echo "No funciono asignar miembro a us";}

?>