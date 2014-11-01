<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["usertorie_seleccionado"])){

		$userstorie = $_POST["usertorie_seleccionado"];
		$id_userstorie = strtok($userstorie, ':');
		$id_sprint = $_POST["id_sprint"];
		$num_sprint = $_POST["num_sprint"];
		$id_proyecto = $_SESSION["proyecto"];

		echo "$id_userstorie";

			
		include("../system/conect.php");
		
		$query = "UPDATE userstorie SET idsprint = $id_sprint WHERE Idus = $id_userstorie";
		$result = $mysqli->query($query);
		header("location: ../html/asignar_us.php?id_sprint=$id_sprint&num_sprint=$num_sprint");
	} else
	{echo "Error en consulta userstorie_por_sprint";}

?>