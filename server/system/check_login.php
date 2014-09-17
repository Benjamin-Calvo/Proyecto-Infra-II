<?php
	session_start();
	if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
		$usuario = $_POST["usuario"];
		$contrasena = $_POST["contrasena"];
		include("conect.php");
		$query = "SELECT idMiembro, EsAdmin, username, password FROM miembro WHERE username='$usuario' AND password='$contrasena'"; 
		$result = $mysqli->query($query);
		if ($result->num_rows != 1) {
			setcookie("login_error",1,time()+10);
		} else {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if ($row["EsAdmin"] == 1){
				$_SESSION["is_admin"] = 1;
			}
			else {
				$_SESSION["is_admin"] = 0;
			}
		 	$_SESSION["miembro"] = $row["idMiembro"];
			$_SESSION["logged_in"]=true;
		}
		//echo $_SESSION["is_admin"].$_SESSION["miembro"];
		header("location: login.php");
	}
?>