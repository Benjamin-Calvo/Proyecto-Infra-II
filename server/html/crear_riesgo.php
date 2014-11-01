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
	<title>Crear Riesgo</title>
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
				<h3>Nuevo Riesgo</h3>
				<form role="form" action="../acciones/insertar_riesgo.php" method="POST">
					<br>
					<div class="form-group">
				    		<label for="descripcion_breve">Descripción Breve: </label>
				    		<textarea name="descripcion_breve" type="text" class="form-control " id="descripcion_breve" placeholder="Descripción breve del riesgo"></textarea>
				  	</div>
				  	<div class="form-group">
				    		<label for="descripcion_detallada">Descripción Detallada: </label>
				    		<textarea name="descripcion_detallada" type="text" class="form-control " id="descripcion_detallada" placeholder="Descripción detallada del riesgo"></textarea>
				  	</div>
				  	<div class="form-group">
				  		<label for="estrategia">Estrategia: </label>
					    <select class="form-control" name="estrategia">
						  	<option>Aceptación</option>
						  	<option>Evasión</option>
						  	<option>Mitigación</option>
						  	<option>Transferencia</option>
						</select>
					</div>
					<div class="form-group">
				    		<label for="plan_accion">Plan de acción: </label>
				    		<textarea name="plan_accion" type="text" class="form-control " id="plan_accion" placeholder="Indica el plan de acción a seguir"></textarea>
				  	</div>
				  	<div class="form-group">
				    	<label for="impacto">Impacto :</label>
				    	<input name="impacto" type="text"  class="form-control " id="impacto" placeholder="Impacto en el proyecto">
				  	</div>
				  	<div class="form-group">
				    	<label for="ocurrencia">Ocurrencia :</label>
				    	<input name="ocurrencia" type="text" class="form-control " id="ocurrencia" placeholder="Ocurrencia del riesgo">
				  	</div>
				  	<div>
				   			<div class="form-group">
				    		<label for="responsable">Responsable :</label>
				    		<input name="responsable" type="text" class="form-control " id="responsable" placeholder="Responsable del riesgo">
				  			</div>	
				  	</div>
					<div class="col-md-2">
						<button type="submit"class='btn btn-primary pull-left'>Agregar</button>
					</div>
					
				</form>
				<div class="col-md-2">
						<a href="riesgos.php"><button class="btn btn-primary pull-left">Regresar</button></a>
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
