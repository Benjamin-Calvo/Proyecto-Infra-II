<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Crear Sprint</title>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <!--<script src="resources/js/bootstrap.min.js" language="javascript" type="text/javascript"></script>-->
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
				<form role="form" action="insertar_sprint.php" method="POST">  <!--Esto es lo que hace que el boton llame a insersprint-->
					<br>
          <div class="col-md-12">
				   	<div class="form-group">
				    	<label for="numero_sprint">Numero de Sprint:</label>
				    	<input name="numero_sprint" type="text" class="form-control" id="numero_sprint" placeholder="#Sprint">
				    </div>
          </div>
				    <div class="col-md-12">
          		    	<label for="fecha de inicio">Fecha de inicio:</label>
          		    </div>
            		<div class="col-md-1">
          		        <label for="dia">Día:</label>
            		</div>
            		<div class="col-md-2">
          		        <input name="dia" type="text" class="form-control" id="dia" placeholder="Dia">
            		</div>
            		<div class="col-md-1">
          		        <label for="mes">Mes:</label>
            		</div>
            		<div class="col-md-2">
          		        <input name="mes" type="text" class="form-control" id="mes" placeholder="Mes">
            		</div>
            		<div class="col-md-1">
          		        <label for="anno">Año:</label>
            		</div>
            		<div class="col-md-2">
          		        <input name="anno" type="text" class="form-control" id="anno" placeholder="Año">
            		</div>
            		<br>
            		<div class="col-md-12">
            			<br>
            			<label for="fecha de final">Fecha de final:</label>
            		</div>
            		<div class="col-md-1">
          		        <label for="dia1">Día:</label>
            		</div>
            		<div class="col-md-2">
          		        <input name="dia1" type="text" class="form-control" id="dia1" placeholder="Dia">
            		</div>
            		<div class="col-md-1">
          		        <label for="mes1">Mes:</label>
            		</div>
            		<div class="col-md-2">
          		        <input name="mes1" type="text" class="form-control" id="mes1" placeholder="Mes">
            		</div>
            		<div class="col-md-1">
          		        <label for="anno1">Año:</label>
            		</div>
            		<div class="col-md-2">
          		        <input name="anno1" type="text" class="form-control" id="anno1" placeholder="Año">
            		</div>

            		<div class="col-md-3 invisible">
                  <input type="text" class="form-control" value="hola soy una entrada invisible nadie me va ver">
                </div>

                <div class="col-md-2">
                  <br>
                  <button type="submit" class="btn btn-primary">Crear Sprint</button>
                </div>
                
				</form>
        <div class="col-md-2">
          <br>
          <a href="releases.php"><button class="btn btn-primary pull-left">Cancelar</button></anno1>
        </div>
            
			</div>
		</div>
	</div>
</body>
</html>
<?php
	
  }
?>