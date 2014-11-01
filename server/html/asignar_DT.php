<?php
   session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  
  	$id_us = $_GET["id_us"];
  	$id_sprint = $_GET["id_sprint"];
	
	include("../system/conect.php");


	$query_usuarios = "SELECT distinct m.idMiembro, m.NombreMiembro, m.ApellidoMiembro FROM miembro m inner join miembro_por_proyecto mp on mp.idMiembro = m.idMiembro inner join proyecto p on p.idproyecto = mp.idproyecto where mp.Rol = 'DT' ";
	$result_usuarios = $mysqli->query($query_usuarios);
    	 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Asignar equipo</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
</head>
<body>
	<?php
		include("../system/encabezado.php");
	?>
	<div class="container minimizar_ancho" >
		
		<div class="row">
			<div class="col-md-12">
					<form role="form" action="../acciones/asociar_DT.php" method="POST">
						<br>
					   <div class="form-group" >
					    <H3 for="seleccion_usuario">Seleccione el developer/tester:</H3>
					    <select class="form-control" name="usuario_seleccionado">
						  	<?php
								while ($row = $result_usuarios->fetch_array(MYSQLI_ASSOC)) {
									echo "<option>".$row["idMiembro"].": ".$row["NombreMiembro"]." ".$row["ApellidoMiembro"]."</option>";								
								}
							?>
						</select>
					    </div>

					    
                  			<?php echo "<input name='id_us' type='hidden' class='form-control' value=".$id_us.">";
                  				echo "<input name='id_sprint' type='hidden' class='form-control' value=".$id_sprint.">";
                   			?>
                		
						<br>
					</div>
						
							<!--Necesito que en este boton le mande idUS = $id_US, que es el id que usted me manda en GET-->
						<div class="col-md-4">
							
							<button class='btn btn-primary pull-left'>Asignar miembro</button>";
							
						</div>  
					</form>
			
			<div class="col-md-3">
				<?php
					echo "<a href='us_sprint.php?id_sprint=$id_sprint'><button class='btn btn-primary pull-left'>Finalizar</button></a>";
				?>
				
			</div>
		</div>
	</div>
</body>
</html>
<?php
}	
?>