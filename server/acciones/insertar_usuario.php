<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["nombre_usuario"]) && isset($_POST["apellido_usuario"]) && isset($_POST["cedula_usuario"]) && isset($_POST["correo_usuario"]) && isset($_POST["numero_usuario"]) && isset($_POST["user_usuario"]) && isset($_POST["contraseña_usuario"]) ) {
		$nombre = $_POST["nombre_usuario"];
		$apellido = $_POST["apellido_usuario"];
		$cedula = $_POST["cedula_usuario"];
		$correo = $_POST["correo_usuario"];
		$telefono = $_POST["numero_usuario"];
		$user = $_POST["user_usuario"];
		$password = $_POST["contraseña_usuario"];
		include("../system/conect.php");
		$query = "INSERT INTO miembro (NombreMiembro, ApellidoMiembro, CedulaMiembro, Telefono, CorreoMiembro, Username, Password, EsAdmin) values ('$nombre', '$apellido', '$cedula', '$telefono', '$correo', '$user', '$password', 0)";
		$result = $mysqli->query($query);
		header("location: ../html/crear_usuario.php");
	} else
	{echo "Error en query insertar_usuario";}

?>