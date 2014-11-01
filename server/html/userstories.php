<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	
	include("../system/conect.php");
	
	$query = "SELECT IdUS, DescripcionUS FROM userstorie where idProyecto=$id_proyecto"; 
	$result = $mysqli->query($query);	


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>User Stories</title>
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
				<h1 class='page-header'>User Stories</h1>
				<table class="table table-striped table-hover">

					<thead>
						<th><H3>Editar user stories</H3></th>
						<th><H3>Eliminar user story</H3></th>
					</thead>
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td><a href='editar_us.php?id_us=".$row["IdUS"]."'>".$row["DescripcionUS"]."</a></td>
								<td><a href='../acciones/eliminar_us.php?id_us=".$row["IdUS"]."' ><i class='glyphicon glyphicon-trash'></i></td></tr>";
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

