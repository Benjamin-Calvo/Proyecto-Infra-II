<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_miembro = $_SESSION["miembro"];

  	if ($_SESSION["is_admin"] == 1){
  		$is_admin = true;
  	}
  	else{
  		$is_admin = false;
  	}
	include("system/conect.php");
	if ($is_admin){
		$query = "SELECT idProyecto,nombreProyecto FROM proyecto"; 
	}
	else {
		$query = "SELECT p.idProyecto, p.nombreProyecto FROM proyecto p inner join miembro_por_proyecto mp on p.idProyecto = mp.idProyecto WHERE mp.idMiembro = $id_miembro"; 
	}
	$result = $mysqli->query($query); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Proyectos</title>
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
				<h1 class='page-header'>Proyectos</h1>
				<table class="table table-striped table-hover">
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
							/*  En esta linea se debe de cambiar en la etiqueta
							a lo de la pagina a direccione*/
							if ($is_admin){
								echo "<tr><td>".$row["nombreProyecto"]."</td><td><a href='asignar_usuario.php?id_proyecto=".$row["idProyecto"]."'><i class='glyphicon glyphicon-plus'></i></td></tr>";
							}
							else {
								echo "<tr><td><a href='editar_proyecto.php?id_proyecto=".$row["idProyecto"]."'>".$row["nombreProyecto"]."</a></td></tr>";
							}
						}
					?>
					</tbody>
				</table>
			<?php
				if ($is_admin)	{
			?>	
			</div>
			<div class="col-md-2">
				<a href="proyecto_nuevo.php"><button class="btn btn-primary pull-left">Proyecto Nuevo</button></a>
			</div>
			<div class="col-md-2">
				<a href="crear_usuario.php"><button class="btn btn-primary pull-left">Crear Usuario</button></a>
			</div>
			<?php
				}	
			?>
		</div>
	</div>
</body>
</html>
	<?php
  }
?>
