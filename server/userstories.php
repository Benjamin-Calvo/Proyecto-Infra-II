<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	
	include("system/conect.php");
	
	$query = "SELECT IdUS, DescripcionUS FROM userstorie where idProyecto=$id_proyecto"; 
	$result = $mysqli->query($query);	


	/*if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$id_us = $row["nombreProyecto"];
		$releases = $row["CantidadReleases"];
		$descripcion = $row["DescripcionProyecto"];
	}
	else {
		$nombre = "nombreProyecto";
		$releases = "NumeroRelease";
		$descripcion = "DescripcionProyecto";
	}  */  	 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>User Stories</title>
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<header class='encabezado'>
		<img src='resources/images/logo.png'>
		<h1>SCRUM</h1>
		<a href="system/cerrar_sesion.php"><button type="submit" class="btn btn-link btn-x pull-right">Cerrar sesión</button></a>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class='page-header'>User Stories</h1>
				<table class="table table-striped table-hover">
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td><a href='editar_us.php?id_us=".$row["IdUS"]."'>".$row["DescripcionUS"]."</a></td><td><a href='eliminar_us.php?id_us=".$row["IdUS"]."'><i class='glyphicon glyphicon-trash'></i></td></tr>";
							}
						}
					?>
					</tbody>
				</table>	
			</div>
			<div class="col-md-2">
				<a href="crear_us.php"><button class="btn btn-primary pull-left">Crear User Storie</button></a>
			</div>
			<div class="col-md-2">
				<?php
					echo "<a href='editar_proyecto.php?id_proyecto=".$id_proyecto."'><button class='btn btn-primary pull-left'>Proyecto</button></a>";
				?>
			</div>
		</div>
	</div>
</body>
</html>

