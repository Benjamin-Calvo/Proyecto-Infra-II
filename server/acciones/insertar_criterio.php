<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["nombre_proyecto"]) && isset($_POST["descripcion"]) && isset($_POST["id_us"]) && isset($_POST["id_sprint"])) {
		
		$nombre_proyecto = $_POST["nombre_proyecto"];
		$descripcion = $_POST["descripcion"];
		$id_us = $_POST["id_us"];
		$id_sprint = $_POST["id_sprint"];

		include("../system/conect.php");
		$query = "INSERT INTO criterio (descripcionCriterio, metrica, IdUS) values ( '$nombre_proyecto', '$descripcion', '$id_us')";

		$result = $mysqli->query($query);
		header("location: ../html/criterios_aceptacion.php?id_us=$id_us&id_sprint=$id_sprint");
	} else
	{echo "Error en query en insertar_criterio";}

?>