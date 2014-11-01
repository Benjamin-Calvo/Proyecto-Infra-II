<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	$id_us = $_GET["id_us"];
  	$id_sprint = $_GET["id_sprint"];
	include("../system/conect.php");
	
	$query = "SELECT DescripcionAct, IdAct FROM actividad WHERE idus = $id_us " ; 
	$result = $mysqli->query($query);	
	

	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Tareas</title>
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
				<h1 class='page-header'>Tareas</h1>
				<table class="table table-striped table-hover">
					<thead>
						<th><H3>Descripción</H3></th>
						<th><H3>Editar tarea</H3></th>
						<th><H3>Eliminar tarea</H3></th>
					</thead>
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td>".$row["DescripcionAct"].
								"</td> <td><a href='editar_tarea.php?id_tarea=".$row["IdAct"]."&idus=$id_us&id_sprint=$id_sprint'><i class='glyphicon glyphicon-pencil'></i></td> 
								<td><a href='../acciones/eliminar_tarea.php?id_tarea=".$row["IdAct"]."&id_us=$id_us&id_sprint=$id_sprint'><i class='glyphicon glyphicon-trash'></i></td></tr>";
							}
						}
					?>
					</tbody>
				</table>
				
				
			</div>
			<div class="col-md-2">
				<?php
					echo "<a href='crear_tarea.php?idus=$id_us&id_sprint=$id_sprint'><button class='btn btn-primary pull-left'>Crear tarea</button></a>";
				?>
				
			</div>
			
			<div class="col-md-2">
				<?php
					echo "<a href='us_sprint.php?id_sprint=".$id_sprint."'><button class='btn btn-primary pull-left'>Regresar</button></a>";
				?>
			</div>

		</div>
	</div>
</body>
</html>

