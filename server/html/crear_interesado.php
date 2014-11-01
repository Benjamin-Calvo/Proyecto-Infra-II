<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else { 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear Interesado</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
</head>
<body>
	<?php
		include("../system/encabezado.php");
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Nuevo Interesado</h3>
				<form role="form" action="../acciones/insertar_interesado.php" method="POST">
					<br>
				  	<div class="form-group">
				    	<label for="nombre_usuario">Nombre :</label>
				    	<input name="nombre_usuario" type="text"  class="form-control " id="nombre" placeholder="Nombre">
				  	</div>
				  	<div class="form-group">
				    	<label for="apellido_usuario">Apellidos :</label>
				    	<input name="apellido_usuario" type="text" class="form-control " id="apellido" placeholder="Apellidos">
						<!--<textarea name="descripcion" class="form-control" rows="3"></textarea>	-->
				  	</div>

				  	<div>
				  		<div class="form-group">
				    		<label for="expectativa">Expectativa :</label>
				    		<textarea name="expectativa" type="text" class="form-control " id="expectativa" placeholder="Expectativa del interesado"></textarea>
				  		</div>
				   		<div class="form-group">
				    		<label for="interes">Interés :</label>
				    		<textarea name="interes" type="text" class="form-control " id="interes" placeholder="Interés"></textarea>
				  		</div>
				  		<div>
				   			<div class="form-group">
				    		<label for="correo_usuario">Correo :</label>
				    		<input name="correo_usuario" type="text" class="form-control " id="correo" placeholder="E-mail">
				  			</div>	
				  		</div>			  		
		  				<div>
		   					<div class="form-group">
		    					<label for="telefono">Teléfono :</label>
		    					<input name="telefono" type="text" class="form-control " id="telefono" placeholder="Número Telefónico">
		  					</div>
		  				</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<button type="submit"class='btn btn-primary pull-left'>Agregar</button></a>
					</div>
					
				</form>
				<div class="col-md-2">
						<a href="interesados.php"><button class="btn btn-primary pull-left">Finalizar</button></a>
				</div>
			</div>
		</div>	
		<br>
	</div>
</body>
</html>
	<?php
  }
?>
