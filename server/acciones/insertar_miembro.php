<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["usuario_seleccionado"]) && isset($_POST["rol_seleccionado"])) {

		$id_proyecto = $_SESSION["proyecto"];
		$usuario = $_POST["usuario_seleccionado"];
		$id_usuario = strtok($usuario, ':');
		$rol_entero = $_POST["rol_seleccionado"];

		if (strcmp($rol_entero, "Product Owner") == 0){
			$rol = "PO";
		}

		if (strcmp($rol_entero, "Scrum Master") == 0){
			$rol = "SM";
		}

		if (strcmp($rol_entero, "Developer / Tester") == 0){
			$rol = "DT";
		}

		include("../system/conect.php");

		$query = "INSERT INTO miembro_por_proyecto (IdProyecto, IdMiembro, Rol) values ( '$id_proyecto', '$id_usuario', '$rol')";
		$result = $mysqli->query($query);
		
		header("location: ../html/asignar_usuario.php?id_proyecto=$id_proyecto");
	} else
	
	{echo "No funciono asignar miembro";}

?>