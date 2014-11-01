<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_GET["id_proyecto"]) && isset($_GET["releases"])) {
		$id_proyecto = $_GET["id_proyecto"];
		$releases = $_GET["releases"];
		$cantidad = 0;

		include("../system/conect.php");

		while($cantidad < $releases){
			$query = "INSERT INTO releases (NumRelease, IdProyecto) values('$cantidad', '$id_proyecto')";
			$result = $mysqli->query($query);
			$cantidad = $cantidad+1;
		}
		header("location: ../html/index.php");
	} else
		{echo "fallo en insertar release";}

?>