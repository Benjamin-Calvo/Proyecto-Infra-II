<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	
  	$id_us = $_GET["id_us"];
  	$id_sprint = $_GET["id_sprint"];
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
				<form role="form" action="../acciones/insertar_criterio.php" method="POST">  <!--Esto es lo que hace que el boton llame a insertarproyecto-->
					<br>
          <div class="col-md-12">
				  	<div class="form-group">
				    	<label for="nombre_proyecto">Descripción del Criterio:</label>
				    	<input name="nombre_proyecto" type="text" class="form-control" id="nombre_proyecto" placeholder="Descripción">
				  	</div>
				  	<div class="form-group">
				    	<label for="descripcion">Métrica:</label>
						  <textarea name="descripcion" class="form-control" rows="3"></textarea>				  
					  </div>
          </div>
				<div class="col-md-3 invisible">
                  <?php echo "<input name='id_us' type='text' class='form-control' value=".$id_us.">";
                  		echo "<input name='id_sprint' type='text' class='form-control' value=".$id_sprint.">";
                   ?>
                </div>

                <div class="col-md-2">
                  <br>
                  <button type="submit" class="btn btn-primary">Crear Criterio</button>
                </div>
                
				</form>
        <div class="col-md-2">
          <br>
          <?php
          	echo "<a href='criterios_aceptacion.php?id_us=".$id_us."&id_sprint=".$id_sprint."'><button class='btn btn-primary pull-left'>Cancelar</button></a>";
          ?>
        </div>
            
			</div>
		</div>
	</div>
</body>
</html>
<?php
	
  }
?>