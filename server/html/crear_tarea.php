<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  
  $idus = $_GET["idus"]; 
  $id_sprint = $_GET["id_sprint"];

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Crear Tarea</title>
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
				<form class="form-horizontal" role="form" action="../acciones/insertar_tarea.php" method="POST">
					<br>
					<h1>Crear Tarea</h1>
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
    					<label for="esfuerzo" class="col-sm-5 control-label">Horas de esfuerzo  </label>
    					<div class="col-sm-7">
      						<input name="esfuerzo" type="text" class="form-control" id="esfuerzo" placeholder="Horas de esfuerzo">
   						</div>
   						<?php 
   							echo "<input name='idus' type='hidden' class='form-control' id='idus' value='$idus'>";
   							echo "<input name='id_sprint' type='hidden' class='form-control' id='id_sprint' value='$id_sprint'>";
   						?>
 					</div>

                    	<button type="submit" class="btn btn-primary col-md-4">Crear Tarea</button>
				</form>
				<p class="col-md-2"></p>
				<?php 
					echo "<a href='tareas.php?id_us=$idus&id_sprint=$id_sprint'><button type='submit' class='btn btn-primary col-md-4' id='button_cancelar'>Regresar</button></a>"

				?>
			</div>
		</div>
	</div>



<?php
	}
  
?>