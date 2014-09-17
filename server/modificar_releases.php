<?php
	session_start();
	if (isset($_SESSION["logged_in"]) && isset($_POST["numero_release_nuevo"])){
		$cantidad_nueva = $_POST["numero_release_nuevo"];
		$id_proyecto = $_SESSION["proyecto"];
		
		include("system/conect.php");
		$query_cant_releases = "SELECT CantidadReleases from proyecto where IdProyecto = $id_proyecto";
		$result_cant_releases = $mysqli->query($query_cant_releases);
		$row = $result_cant_releases->fetch_array(MYSQLI_ASSOC);
		$cantidad_releases = $row["CantidadReleases"];
		$cantidad_insertar = $cantidad_nueva-$cantidad_releases;
		$cantidad = 0;

		while($cantidad < $cantidad_insertar){
			$query = "INSERT INTO releases (NumRelease, IdProyecto) values('$cantidad_releases', '$id_proyecto')";
			$result = $mysqli->query($query);
			$cantidad_releases = $cantidad_releases + 1;
			$cantidad = $cantidad + 1;
		}

		$query = "UPDATE proyecto SET CantidadReleases = $cantidad_nueva WHERE IdProyecto = $id_proyecto";
		$result = $mysqli->query($query);
		header("location: editar_proyecto.php?id_proyecto=$id_proyecto");
	} else
	{echo "fvgbhnjm";}

?>