<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	//$es_super = true;
	//include("system/conect.php");
	//$query = "SELECT idProyecto,nombreProyecto FROM proyecto"; 
	//$result = $mysqli->query($query); 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Crear Usuario</title>
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
				<h3>Crear usuario</h3>
				<form role="form" action="../acciones/insertar_usuario.php" method="POST">
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
				    		<label for="cedula_usuario">Cedula :</label>
				    		<input name="cedula_usuario" type="text" class="form-control " id="cedula" placeholder="Cedula de identidad">
				  		</div>
				   		<div class="form-group">
				    		<label for="correo_usuario">Correo :</label>
				    		<input name="correo_usuario" type="text" class="form-control " id="correo" placeholder="E-mail">
				  		</div>
				  		<div>
				   			<div class="form-group">
				    			<label for="numero_usuario">Numero de telefono :</label>
				    			<input name="numero_usuario" type="text" class="form-control " id="numero" placeholder="Numero">
				  			</div>

				  			<div>
				   				<div class="form-group">
				    				<label for="user_usuario">UserName :</label>
				    				<input name="user_usuario" type="text" class="form-control " id="user" placeholder="UserName">
				  				</div>
				  				<div>
				   					<div class="form-group">
				    					<label for="contraseña_usuario">Contraseña :</label>
				    					<input name="contraseña_usuario" type="password" class="form-control " id="contraseña" placeholder="Contraseña">
				  					</div>
				  				</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<a href='crear_usuario.php'><button type="submit"class='btn btn-primary pull-left'>Crear</button></a>
					</div>
					
				</form>
				<div class="col-md-2">
						<a href="index.php"><button class="btn btn-primary pull-left">Finalizar</button></a>
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
