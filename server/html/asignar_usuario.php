<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } else {
  	$id_proyecto = $_GET["id_proyecto"];/* Se obtiene el id enviado desde index.php*/
  	$_SESSION["proyecto"] = $id_proyecto;
  
	include("../system/conect.php");

		$query = "SELECT nombreProyecto FROM proyecto where idProyecto=$id_proyecto"; 
		$result = $mysqli->query($query);

		$query_usuarios = "SELECT idMiembro, NombreMiembro, ApellidoMiembro FROM miembro WHERE idMiembro NOT IN ( SELECT idMiembro from miembro_por_proyecto WHERE idProyecto = $id_proyecto) AND EsAdmin = 0"; 
		$result_usuarios = $mysqli->query($query_usuarios);
		
		if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$nombre = $row["nombreProyecto"];
		}
		else {
			$nombre = "nombreProyecto";
		}
    	 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Asignar equipo</title>
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
					<form role="form" action="../acciones/insertar_miembro.php" method="POST">
						<br>
					  <div class="form-group">
					    <H3 for="nombre_proyecto">Nombre del Proyecto:</H3>
					    <?php
					    echo "<h5 for='nombre_proyecto'>".$nombre."</h5>";
					    ?>
						</div>
					   <div class="form-group" >
					    <H3 for="seleccion_usuario">Seleccione el usuario:</H3>
					    <select class="form-control" name="usuario_seleccionado">
						  	<?php
								while ($row = $result_usuarios->fetch_array(MYSQLI_ASSOC)) {
									echo "<option>".$row["idMiembro"].": ".$row["NombreMiembro"]." ".$row["ApellidoMiembro"]."</option>";								
								}
							?>
						</select>
					    </div>
					   
					    <H3 for="rol">Rol:</H3>
					    <select class="form-control" name="rol_seleccionado">
						  	<option>Product Owner</option>
						  	<option>Scrum Master</option>
						  	<option>Developer / Tester</option>
						</select>
						<br>
					</div>
						

						<div class="col-md-4">
							<?php
								echo "<a href='asignar_usuario.php?id_proyecto=".$id_proyecto."'><button class='btn btn-primary pull-left'>Asignar miembro</button></a>";
							?>
						</div>  
					</form>
			
			<div class="col-md-3">
				<a href="index.php"><button class="btn btn-primary pull-left">Finalizar</button></a>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	
  }
?>