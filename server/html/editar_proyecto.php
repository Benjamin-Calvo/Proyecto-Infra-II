<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_GET["id_proyecto"];
  	$_SESSION["proyecto"] = $id_proyecto;
  	$id_miembro = $_SESSION["miembro"];

	include("../system/conect.php");
	
	$query = "SELECT nombreProyecto,CantidadReleases,DescripcionProyecto FROM proyecto where idProyecto=$id_proyecto"; 
	$result = $mysqli->query($query);	

	$query_rol = "SELECT Rol FROM miembro_por_proyecto WHERE idProyecto = $id_proyecto AND idMiembro = $id_miembro";
	$result_rol = $mysqli->query($query_rol);

	$row_rol = $result_rol->fetch_array(MYSQLI_ASSOC);
	$rol = $row_rol["Rol"];

	$_SESSION["rol"] = $rol;

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
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
</head>
<body>
	<?php
		include("../system/encabezado.php");
	?>
	<div class="container minimizar_ancho" >
		<div class="row">
			<div class="col-md-12">
				<h1>Editar Proyecto</h1>
			<?php
				if ($rol == "PO")
				{
			?>
				<form role="form" action="../acciones/modificar_releases.php" method="POST">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
			<?php
				}
			?>
			<?php
				if ($rol == "SM")
				{
			?>
				<form role="form" action="../acciones/modificar_duracion_sp.php" method="POST">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
			<?php
				}
			?>
			<?php
				if ($rol == "DT")
				{
			?>
				<form role="form">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
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
				    		echo "<textarea class='form-control' cols='38' rows='3' readonly='readonly'>$descripcion</textarea>";
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
				</form>
				<a href="userstories.php"><button type="submit" class="btn btn-primary btn-lg btn-block">Administrar User Stories </button></a>
				<br>
				<a href="interesados.php"><button type="button" class="btn btn-primary btn-lg btn-block">Administrar Stakeholders</button></a>
				<br>
				<a href="riesgos.php"><button type="button" class="btn btn-primary btn-lg btn-block">Administrar Riesgos</button></a>
				<br>
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
					<a href="releases.php"><button type="button" class="btn btn-primary btn-lg btn-block">Administrar Releases</button></a>
					<br>
					<a href="riesgos.php"><button type="button" class="btn btn-primary btn-lg btn-block">Administrar Riesgos</button></a>
					<br>
				<?php
					}		
				?>

				<?php
					if ($rol == "DT")
					{
				?>
				<br>
				</form>
				<br>
				<a href="sprints.php"><button type="submit" class="btn btn-primary col-sm-8">Administrar Tareas</button></a>
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