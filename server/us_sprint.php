<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	$id_sprint = $_GET["id_sprint"];
  	
	include("system/conect.php");
	
	$query = "SELECT Num_Sprint, IdRelease FROM sprint where IdSprint=$id_sprint"; 
	$result = $mysqli->query($query);//Esta en result los numero sprint
	$row1 = $result->fetch_array(MYSQLI_ASSOC);

	$query_us = "SELECT IdUS, DescripcionUS FROM userstorie WHERE idsprint = $id_sprint"; 
	$result_us = $mysqli->query($query_us);





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
	<?php echo "<title>Sprint ".$row1["Num_Sprint"]."</title>";?>
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
				<?php echo"<h1 class='page-header'>Sprint: ".$row1["Num_Sprint"]."</h1>";?>
				<H3>User Stories</H3>
				<table class="table table-striped table-hover">
					<tbody>
					<?php
						while ($row = $result_us->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td>".$row["DescripcionUS"]."</td><td><a href='desenlazar_us.php?id_us=".$row["IdUS"]."&id_sprint=".$id_sprint."><i class='glyphicon glyphicon-trash'></i></td></tr>";
							}
						}
					?>
					</tbody>
				</table>	
			</div>
			<div class="col-md-2">
				<?php echo "<a href='sprints.php?id_us=".$id_sprint."'><button class='btn btn-primary pull-left'>Listo</button></a>"; ?>
			</div>
		</div>
	</div>
</body>
</html>

