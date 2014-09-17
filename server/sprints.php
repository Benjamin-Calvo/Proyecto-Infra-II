<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	$id_release = $_GET["id_release"];
	include("system/conect.php");
	
	$query = "SELECT Num_sprint, IdSprint FROM sprint where IdRelease=$id_release"; 
	$result = $mysqli->query($query);	

	$query_release = "SELECT NumRelease FROM releases where IdRelease=$id_release"; 
	$result_release = $mysqli->query($query_release);	
	$row = $result_release->fetch_array(MYSQLI_ASSOC);
	$num_release = $row["NumRelease"];

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
	<?php echo"<title>Release ".$num_release."</title>"; ?>
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
				<h1 class='page-header'>Sprints</h1>
				<table class="table table-striped table-hover">
					<tbody>
					<?php
						while ($row_sprint = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td><a href='us_sprint.php?id_sprint=".$row_sprint["IdSprint"]."'>Sprint  ".$row_sprint["Num_sprint"].
								"</a></td> <td><a href='asignar_us.php?id_sprint=".$row_sprint["IdSprint"]."&num_sprint=".$row_sprint["Num_sprint"]."'><i class='glyphicon glyphicon-plus'></i></td> <td><a href='editar_sprint.php?id_sprint=".$row_sprint["IdSprint"]."'><i class='glyphicon glyphicon-pencil'></i></td></tr>";
							}
						}
					?>
					</tbody>
				</table>
				
				
			</div>
			<div class="col-md-12">
			<a href='releases.php'><button class='btn btn-primary pull-left col-md-2'>Listo</button></a>
			</div>
			

		</div>
	</div>
</body>
</html>

