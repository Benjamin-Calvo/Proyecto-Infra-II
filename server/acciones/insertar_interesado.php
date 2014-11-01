<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["nombre_usuario"]) && isset($_POST["apellido_usuario"]) && isset($_POST["expectativa"]) && isset($_POST["interes"]) && isset($_POST["correo_usuario"]) && isset($_POST["telefono"])) {
		
		$id_proyecto = $_SESSION["proyecto"];
		$nombre_usuario = $_POST["nombre_usuario"];
		$apellido_usuario = $_POST["apellido_usuario"];
		$expectativa = $_POST["expectativa"];
		$interes = $_POST["interes"];
		$correo_usuario = $_POST["correo_usuario"];
		$telefono = $_POST["telefono"];

		include("../system/conect.php");
		$mysqli->set_charset("utf8");
		$query = "INSERT INTO interesado (NOMBREINTERESADO, APELLIDOINTERESADO, EXPECTATIVA, INTERES, CORREOINTERESADO, TELEFONO) values ( '$nombre_usuario', '$apellido_usuario', '$expectativa', '$interes', '$correo_usuario', '$telefono')";
		$result = $mysqli->query($query);

		$ultimo_id = "SELECT Last_insert_id()"; 
		$result_id = $mysqli->query($ultimo_id);
		$row = $result_id->fetch_array(MYSQLI_ASSOC);
		$last_id = $row["Last_insert_id()"];
		
		$query2 = "INSERT INTO relationship_3 (IDINTERESADO, IDPROYECTO) values ('$last_id', '$id_proyecto')";
		$result2 = $mysqli->query($query2);

		header("location: ../html/crear_interesado.php");
	} else
	{echo "Error en query en insertar_interesado";}

?>