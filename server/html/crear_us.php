<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	
	//include("system/conect.php");
	
		//$query = "SELECT idProyecto,nombreProyecto FROM proyecto"; 
		//$result = $mysqli->query($query); 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Crear User Storie</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
    <!--<script src="resources/js/bootstrap.min.js" language="javascript" type="text/javascript"></script>-->
</head>
<body>
	<?php
		include("../system/encabezado.php");
	?>
	<div class="container minimizar_ancho">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" role="form" action="../acciones/insertar_us.php" method="POST">
					<br>
					<h1>Crear User Storie</h1>
					<div class="form-group">
						<div class="col-md-12">
    						<label for="descripcion" class="control-label">Descripción</label>
    					</div>
    					<div class="col-sm-12">
    						<br>
      						<textarea name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion"></textarea>
   						</div>
   						<br>
 					</div>

 					<div class="form-group">
    					<label for="prioridad" class="col-sm-4 control-label">Prioridad del US</label>
    					<div class="col-sm-8">
      						<input name="prioridad" type="text" class="form-control" id="prioridad" placeholder="Prioridad">
   						</div>
 					</div>

 					<div class="form-group">
    					<label for="puntos" class="col-sm-4 control-label">Puntos        </label>
    					<div class="col-sm-8">
      						<select name="puntos" class="form-control" name="rol_seleccionado">
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
                    	<button type="submit" class="btn btn-primary col-md-4">Crear User Storie</button>
				</form>
				<p class="col-md-2"></p>
				<a href="userstories.php"><button type="submit" class="btn btn-primary col-md-4" id="button_cancelar">Cancelar</button></a>
			</div>
		</div>
	</div>



<?php
	}
  
?>