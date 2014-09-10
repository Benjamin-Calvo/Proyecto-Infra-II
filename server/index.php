<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } else {
  	$es_super = true;
	include("system/conect.php");
	if ($es_super) {
		$query = "SELECT id,nombre FROM proyecto"; 
		$result = $mysqli->query($query); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Proyectos</title>
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">Proyectos</h1>
				<a href="proyecto_nuevo.php"><button class="btn btn-primary pull-right">Proyecto Nuevo</button></a>
				<table class="table table-striped table-hover">
					<tbody>
		<?php
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr><td><a href='proyecto.php?id=".$row["id"]."'>".$row["nombre"]."</a></td><td><a href=""><i class='glyphicon glyphicon-plus'></i></td></tr>";
		}
		?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
	<?php
	}
  }
?>
