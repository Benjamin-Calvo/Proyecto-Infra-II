<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_us = $_GET["id_us"];
  	$id_proyecto = $_SESSION["proyecto"];

	include("system/conect.php");
	
	$query = "SELECT DescripcionUS, Prioridad, PuntosUS FROM userstorie where IdUS=$id_us"; 
	$result = $mysqli->query($query);	


	if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$descripcion = $row["DescripcionUS"];
		$prioridad = $row["Prioridad"];
		$puntos = $row["PuntosUS"];
	}
	else {
		$descripcion = "Descripcion";
		$prioridad = "Prioridad";
		$puntos = "Puntos";
	}    	 
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Editar User Storie</title>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<header class='encabezado'>
		<img src='resources/images/logo.png'>
		<h1>SCRUM</h1>
		<a href="system/cerrar_sesion.php"><button type="submit" class="btn btn-link btn-x pull-right">Cerrar sesión</button></a>
	</header>
	<div class="container minimizar_ancho">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" role="form" action="modificar_us.php" method="POST">
					<br>
					<h1>Editar User Storie</h1>
					<div class="form-group">
						<div class="col-md-12">
    						<label for="descripcion" class="control-label">Descripción</label>
    					</div>
    					<div class="col-sm-12">
    						<br>
      						<?php echo "<textarea name='descripcion' type='text' class='form-control' id='descripcion'>".$descripcion."</textarea>";?>
   						</div>
   						<br>
 					</div>

 					<div class="form-group">
    					<label for="prioridad" class="col-sm-4 control-label">Prioridad del US:</label>
    					<div class="col-sm-8">
      						<?php echo "<input name='prioridad' type='text' class='form-control' value=".$prioridad.">";?>
   						</div>
 					</div>

 					<div class="form-group">
    					<label for="puntos" class="col-sm-4 control-label">Puntos actuales:</label>
    					<div class="col-sm-8">
      						<?php echo "<label class='col-sm-1 control-label'>".$puntos."</label>";?>
   						</div>
 					</div>

 					<div class="form-group">
    					<label for="puntos" class="col-sm-4 control-label">Cambiar puntos:</label>
    					<div class="col-sm-8">
      						<select name="puntos" class="form-control" name="rol_seleccionado">
      							<?php echo "<option>".$puntos."</option>"?>
						  		<option>1/2</option>
						  		<option>1</option>
						  		<option>2</option>
						  		<option>3</option>
						  		<option>5</option>
						  		<option>8</option>
						  		<option>13</option>
						  		<option>20</option>
						  		<option>40</option>
							</select>
   						</div>
 					</div>
 						<?php echo "<input name='idUS' type='hidden' class='form-control' value=".$id_us.">";?>
                    	<button type="submit" class="btn btn-primary col-md-4">Guardar cambios</button>
				</form>
				<p class="col-md-2"></p>
				<a href="userstories.php"><button type="submit" class="btn btn-primary col-md-4" id="button_cancelar">Cancelar</button></a>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	}
?>