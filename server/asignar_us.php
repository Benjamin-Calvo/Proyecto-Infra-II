<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } else {
  	

  	$id_proyecto = $_SESSION["proyecto"];
  	$id_sprint = $_GET["id_sprint"];
  	$num_sprint = $_GET["num_sprint"];
  	include("system/conect.php");
  	

  	$query_release = "SELECT idrelease FROM sprint WHERE idsprint = $id_sprint"; 
	$result_release = $mysqli->query($query_release);
	$row = $result_release->fetch_array(MYSQLI_ASSOC);
  	$id_release = $row["idrelease"];

	

		//$query = "SELECT Num_Sprint FROM Sprint where idProyecto=$id_proyecto"; 
		//$result = $mysqli->query($query);

		$query_us = "SELECT idus,descripcionus FROM userstorie WHERE idProyecto = $id_proyecto and idsprint is null"; 
		$result_us = $mysqli->query($query_us);
		
		//if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			//$num_sprint = $row["Num_Sprint"];
		//}
		//else {
			//$num_sprint = "Num_Sprint";
		//}
    	 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Asignar User Storie</title>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<header class='encabezado'>
		<img src='resources/images/logo.png'>
		<h1>SCRUM</h1>
		<a href="system/cerrar_sesion.php"><button type="submit" class="btn btn-link btn-x pull-right">Cerrar sesión</button></a>
	</header>
	<div class="container minimizar_ancho" >
		
		<div class="row">
			<div class="col-md-12">
					<form role="form" method="POST" action="userstorie_por_sprint.php">
						<br>
					  <div class="form-group">
					    <H3 for="nombre_proyecto">Sprint:</H3>
					    <?php
					    echo "<h4 for='nombre_proyecto'>".$num_sprint."</h4>";
					    ?>
						</div>
					   <div class="form-group" >
					    <H3 for="seleccion_usuario">Seleccione el user storie:</H3>
					    <select class="form-control" name="usertorie_seleccionado">
						  	<?php
								while ($row = $result_us->fetch_array(MYSQLI_ASSOC)) {
									echo "<option>".$row["idus"].":".$row["descripcionus"]."</option>";
								}
							?>
						</select>
					    </div>
					    
					 

						<div "col-md-2">
							<?php
								echo "<a href='userstorie_por_sprint.php'><button class='btn btn-primary pull-left'>Asignar UserStorie</button></a>";
							?>
							
						</div>  
						<div class="col-md-2 invisible">
                  				<input type="text" class="form-control" value="hola soy una entrada invisible nadie me va ver">
                		</div>
                		<?php
                			echo "<input type='text' class='hidden' name='id_sprint' value=".$id_sprint.">";
                			echo "<input type='text' class='hidden' name='num_sprint' value=".$num_sprint.">";
                		?>
					</form>
			
			 <div  "col-md-2">	
			 	<?php
				echo "<a href='sprints.php?id_release=$id_release'><button class='btn btn-primary pull-left'>Finalizar</button></a>";
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