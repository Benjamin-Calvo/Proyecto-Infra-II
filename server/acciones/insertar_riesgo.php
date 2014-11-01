<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["descripcion_breve"]) && isset($_POST["descripcion_detallada"]) && isset($_POST["estrategia"]) && isset($_POST["plan_accion"]) && isset($_POST["impacto"]) && isset($_POST["ocurrencia"])&& isset($_POST["responsable"])) {
		
		$id_proyecto = $_SESSION["proyecto"];
		$descripcion_breve = $_POST["descripcion_breve"];
		$descripcion_detallada = $_POST["descripcion_detallada"];
		$estrategia = $_POST["estrategia"];
		$plan_accion = $_POST["plan_accion"];
		$impacto = $_POST["impacto"];
		$ocurrencia = $_POST["ocurrencia"];
		$responsable = $_POST["responsable"];

		include("../system/conect.php");
		$mysqli->set_charset("utf8");
		$query = "INSERT INTO riesgo (IDPROYECTO, DESCRIPCIONBREVE, DESCRIPCIONDETALLADA, ESTRATEGIA, PLANACCION, IMPACTO, OCURRENCIA, RESPONSABLE) values ( '$id_proyecto', '$descripcion_breve', '$descripcion_detallada', '$estrategia', '$plan_accion', '$impacto', '$ocurrencia','$responsable')";
		$result = $mysqli->query($query);
			
		header("location: ../html/crear_riesgo.php");
	} else
	{echo "Error en query en insertar_riesgo.php";}
?>