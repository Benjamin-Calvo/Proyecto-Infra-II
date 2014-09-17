<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_proyecto = $_GET["id_proyecto"];
  	$_SESSION["proyecto"] = $id_proyecto;
  	$id_miembro = $_SESSION["miembro"];

	include("system/conect.php");
	
	$query = "SELECT nombreProyecto,CantidadReleases,DescripcionProyecto FROM proyecto where idProyecto=$id_proyecto"; 
	$result = $mysqli->query($query);	

	$query_rol = "SELECT Rol FROM miembro_por_proyecto WHERE idProyecto = $id_proyecto AND idMiembro = $id_miembro";
	$result_rol = $mysqli->query($query_rol);

	$row_rol = $result_rol->fetch_array(MYSQLI_ASSOC);
	$rol = $row_rol["Rol"];
	//$_SESSION["rol"] = $rol;

	if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$nombre = $row["nombreProyecto"];
		$releases = $row["CantidadReleases"];
		$descripcion = $row["DescripcionProyecto"];
	}
	else {
		$nombre = "nombreProyecto";
		$releases = "NumeroRelease";
		$descripcion = "DescripcionProyecto";
	}    	 
?>


<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<?php echo "<title>Editar ".$nombre."</title>"?>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<header class='encabezado'>
			<img src='resources/images/logo.png'>
			<h1>SCRUM</h1>
			<a href="system/cerrar_sesion.php"><button type="submit" class="btn btn-link btn-x pull-right">Cerrar sesión</button></a>
	</header>
	<div class="container minimizar_ancho" >
		<div class="row">
			<div class="col-md-12">
				<h1>Editar Proyecto</h1>
			<?php
				if ($rol == "PO")
				{
			?>
				<form role="form" action="modificar_releases.php" method="POST">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
			<?php
				}
			?>
			<?php
				if ($rol == "SM")
				{
			?>
				<form role="form" action="modificar_duracion_sp.php" method="POST">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
			<?php
				}
			?>
					<br>
				  	<div class="form-inline">
				    	
				    	<?php
				    		echo "<h3 for='nombre_proyecto'>Nombre del Proyecto:   ".$nombre."</h3>";
				    	?>
				  	</div>
				  	<div class="form-inline">
				    	<h3 for="descripcion">Descripción:</h3>
						<?php
				    		echo "<textarea class='form-control' cols='50' rows='3' readonly='readonly'>$descripcion</textarea>";
				    	?>	  
					</div>

		<!--Diferentes vistas -->

					<?php
						if ($rol == "PO")
						{
					?>
				   	<div class="form-inline">
				    	<?php
				    		echo "<h3 for='numero_release'>Número de releases:  ".$releases."</h3>";
				   		?>
				    </div>
				    <h4 for="editar">Editar numero de Release:</h4>
				    <div class="form-inline">
				    	<input  name="numero_release_nuevo" type="text"  class="form-control " id="new_release" placeholder="Numero Releases">
				    	<button  type="submit" class="btn btn-primary">Cambiar </button>
				    </div>
				    <br>
				    <br>
				    
				</form>
				<a href="userstories.php"><button type="submit" class="btn btn-primary">Administrar User Stories </button></a>
				<?php
					}		
				?>

				<?php
					if ($rol == "SM")
					{
				?>
				<br>
				<h4>Semanas por sprint:</h4>
				<div class="form-inline">
					<input  name="duracion_sprint" type="text"  class="form-control col-md-4" id="duracion" placeholder="Semanas">
					<input  name="invisible" type="text"  class="form-control invisible" id="invisible" style="max-width: 5px" placeholder="Semanas">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				</form>
				<br>
				<a href="releases.php"><button type="submit" class="btn btn-primary col-sm-4">Administrar Releases</button></a>
				<?php
					}		
				?>
			
			</div>
		</div>
	</div>
</body>
</html>
<?php
	}
?>