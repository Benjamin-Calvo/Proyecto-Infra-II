<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } 
  else {
  	$id_tarea = $_GET["id_tarea"];

	include("system/conect.php");
	
	$query = "SELECT DescripcionAct, TiempoEsfuerzo, Tiemporeal FROM actividad where IdAct = $id_tarea"; 
	$result = $mysqli->query($query);	


	if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$descripcion = $row["DescripcionAct"];
		$esfuerzo = $row["TiempoEsfuerzo"];
		$invertido = $row ["Tiemporeal"];
		$restante = $esfuerzo - $invertido;
	}
	  	 
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Editar tarea</title>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<header class='encabezado'>
		<img src='resources/images/logo.png'>
		<h1>SCRUM</h1>
		<a href="index.php"><button type="submit" class="btn btn-link btn-x pull-right">Home</button></a>
		<a href="system/cerrar_sesion.php"><button type="submit" class="btn btn-link btn-x pull-right">Cerrar sesión</button></a>
	</header>

	<div class="container minimizar_ancho">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" role="form" action="modificar_tarea.php" method="POST">
					<br>
					<h1 class="centrar">Editar tarea</h1>
					<div class="form-group">
						
    					<h3 for="descripcion" class="alinear_izq">Descripción:</h3>
    					
    					<div class="col-sm-12">
      						<?php echo "<label for='descripcion' class='control-label'>".$descripcion."</label>";?>
   						</div>
   						<br>
 					</div>


 					<!-- AQUÍ SE VAN A HACER MODIFICACIONES -->
 					<div class="form-group">
						
    					<h4 for="esfuerzo" class="alinear_izq">Esfuerzo Planeado en horas:</h4>
    					
    					<div class="col-sm-6">
      						<?php echo "<label for='esfuerzo' class='control-label'>".$esfuerzo."</label>";?>
   						</div>
   						
 					</div>





 					<div class="form-group">
						
    					<h4 for="esfuerzo" class="alinear_izq">Esfuerzo Invertido en horas:</h4>
    					
    					<div class="col-sm-6">
      						<?php echo "<label for='esfuerzo' class='control-label'>".$invertido."</label>";?>
   						</div>
   						
 					</div>

 					<div class="form-group">
						
    					<h4 for="esfuerzo" class="alinear_izq">Esfuerzo Restante en horas:</h4>
    					
    					<div class="col-sm-6">
      						<?php echo "<label for='esfuerzo' class='control-label'>".$restante."</label>";?>
   						</div>
   						
 					</div>
    				
   					<!-- LAS MODIFICACIONES EMPIEZAN AQUÍ PARA COMPARAR EL ESTO DE LA ACTIVIDAD	 -->
 					
    					<?php
    						//consultar estado de la actividad
    						$estado_query = "SELECT ESTADOACT FROM actividad WHERE IdAct = $id_tarea";
    						$result_query = $mysqli->query($estado_query);
    						$row = $result_query->fetch_array(MYSQLI_ASSOC);
							$estado = $row["ESTADOACT"];
    						//comparar y y activar el radio de esditar tarea
							?>
		    						<div class='form-group'>	
	      								<h3 for='real' class='alinear_izq col-sm-5.5'>Horas invertidas:</h3>
	   					
	    								<input name='real' type='text' class='form-control' id='real'>
   						
 									</div>	
 									
 									<div class='form-group'>
 										
 										<h3 for='estado' class='alinear_izq col-sm-5.5'>Estado de la tarea:</h3>
 										<div class='radio'>   						
								 		<label>
								 			<?php
								 				if($estado != "T"){
								 					if ($estado == "S"){
										 	?>
		    											<input type='radio' name='estado' id='optionsRadios1' value='S' checked='checked'>

		    									<?php
		    										}

		    										else{
		    									?>
		    										<input type='radio' name='estado' id='optionsRadios1' value='S' >
		    									<?php
		    										}
		    									?>	
								    		Sin iniciar
								  		</label>
									

									</div>

									<div class='radio'>
							  		<label>

							  			<?php
							  			if($estado == "I"){
							  			?>
							    			<input type='radio' name='estado' id='optionsRadios2' value='I' checked='checked'>
							    		<?php
							    		}else {
							    		?>
							    			<input type='radio' name='estado' id='optionsRadios2' value='I' >
							    		<?php
							    		}
							   			?>

							   			Iniciada
							  		</label>
								</div>
								<div class='radio'>
							  		<label>

							    		<input type='radio' name='estado' id='optionsRadios3' value='T'>
							   			Terminada
							  		</label>
							  		</div>
								</div>
							  
								
							
						
					</div>
					<!-- incluir fecha de finalizado -->
					<div class="col-md-12">
          		    	<label for="fecha de inicio">Dia de finalización:</label>
          		    </div>
            		<div class="col-md-1">
          		        <label for="dia">Día:</label>
            		</div>
            		<div class="col-md-3">
          		        <input name="dia" type="text" class="form-control" id="dia" placeholder="Día">
            		</div>
            		<div class="col-md-1">
          		        <label for="mes">Mes:</label>
            		</div>
            		<div class="col-md-3">
          		        <input name="mes" type="text" class="form-control" id="mes" placeholder="Mes">
            		</div>
            		<div class="col-md-1">
          		        <label for="anno">Año:</label>
            		</div>
            		<div class="col-md-3">
          		        <input name="anno" type="text" class="form-control" id="anno" placeholder="Año"><br><br>
            		</div>

            		 		
            		
         			    	


					<!-- FINAL DE LAS MODIFICACIONES -->

 						<?php echo "<br><br><input name='id_tarea' type='hidden' class='form-control' value=".$id_tarea.">";?>
                    	<button type="submit" class="btn btn-primary col-md-4">Guardar cambios</button>
                    		<?php
							  }else{
							  ?>

							  		<font color='green'><h4>Esta tarea ya ha sido terminada</h4></font>
							  	<?php	
							  	}
							  	?>
				</form>
				<p class="col-md-2"></p>
				<a href="tareas.php"><button type="submit" class="btn btn-primary col-md-4" id="button_cancelar">Cancelar</button></a>
				<p class="col-md-12"></p>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	}
?>