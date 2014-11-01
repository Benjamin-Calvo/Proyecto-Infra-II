<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	
	include("../system/conect.php");
	
	$query = "SELECT IdRelease, NumRelease FROM releases where idProyecto=$id_proyecto"; 
	$result = $mysqli->query($query);	


	 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Releases</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
</head>
<body>
	<?php
		include("../system/encabezado.php");
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class='page-header'>Releases</h1>
				<table class="table table-striped table-hover">
					<thead>
						<th><H3>Ver sprints</H3></th>
						<th><H3>Asignar sprints</H3></th>
					</thead>
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td><a href='sprints.php?id_release=".$row["IdRelease"]."'>Release  ".$row["NumRelease"]."</a></td>
								<td><a href='asignar_sprint.php?id_release=".$row["IdRelease"]."'><i class='glyphicon glyphicon-plus'></i></td></tr>";
							}
						}
					?>
					</tbody>
				</table>	
			</div>
			<div class="col-md-2">
				<a href="crear_sprint.php"><button class="btn btn-primary pull-left">Crear Sprint</button></a>
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

