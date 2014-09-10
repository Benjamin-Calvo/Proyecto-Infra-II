<?php
	session_start();
	if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
		$usuario = $_POST["usuario"];
		$contrasena = $_POST["contrasena"];
		include("conect.php");
		$query = "SELECT * FROM usuario WHERE username='$usuario' AND password='$contrasena'"; 
		$result = $mysqli->query($query);
		if ($result->num_rows != 1) {
			setcookie("login_error",1,time()+10);
		} else {
			$_SESSION["logged_in"]=true;
		}
		header("location: login.php");
	}
?>