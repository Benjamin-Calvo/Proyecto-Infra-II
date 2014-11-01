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
	<title>Crear Proyectos</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
    <!--<script src="resources/js/bootstrap.min.js" language="javascript" type="text/javascript"></script>-->
</head>
<body>
	<?php
    include("../system/encabezado.php");
  ?>
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="../acciones/insertar_proyecto.php" method="POST">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
					<br>
          <div class="col-md-12">
				  	<div class="form-group">
				    	<label for="nombre_proyecto">Nombre del Proyecto:</label>
				    	<input name="nombre_proyecto" type="text" class="form-control" id="nombre_proyecto" placeholder="Nombre">
				  	</div>
				  	<div class="form-group">
				    	<label for="descripcion">Descripción:</label>
						  <textarea name="descripcion" class="form-control" rows="3"></textarea>				  
					  </div>
				   	<div class="form-group">
				    	<label for="numero_release">Numero de Release:</label>
				    	<input name="numero_release" type="text" class="form-control" id="numero_release" placeholder="#Release">
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
                  <button type="submit" class="btn btn-primary">Crear Proyecto</button>
                </div>
                
				</form>
        <div class="col-md-2">
          <br>
          <a href="index.php"><button class="btn btn-primary pull-left">Cancelar</button></a>
        </div>
            
			</div>
		</div>
	</div>
</body>
</html>
<?php
	
  }
?>