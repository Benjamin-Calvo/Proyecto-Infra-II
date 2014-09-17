<?php
	session_start();
	unset($_SESSION["miembro"]);
	unset($_SESSION["is_admin"]);
	unset($_SESSION["proyecto"]);
	unset($_SESSION["logged_in"]);
	session_destroy();
	setcookie();
	header("location: login.php");
	
?>