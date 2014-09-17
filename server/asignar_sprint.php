<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: system/login.php");
  } else {
  	$id_release = $_GET["id_release"];
  	$id_proyecto = $_SESSION["proyecto"];
  
	include("system/conect.php");

		$query = "SELECT Num_Sprint FROM sprint where IdProyecto = $id_proyecto AND IdRelease is null"; 
		$result = $mysqli->query($query);
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Asignar Sprint</title>
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
					<form role="form" action="asociar_sprint.php" method="POST">
						<br>
					  <div class="form-group">
					    <H3 for="release">Release:</H3>
					    <?php
					    echo "<h5 for='release'>".$id_release."</h5>";
					    ?>
						</div>
					   <div class="form-group" >
					    <H3 for="seleccion_usuario">Seleccione el sprint:</H3>
					    <select class="form-control" name="sprint_seleccionado">
						  	<?php
								while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
									echo "<option>Sprint  ".$row["Num_Sprint"]."</option>";
								}
							?>
						</select>
						<?php echo"<input name='id_release' type='hidden' value='".$id_release."'>";?>
					    </div>
					</div>
						

						<div class="col-md-4">
							<?php
								echo "<a href='asignar_sprint.php?id_release=".$id_release."'><button class='btn btn-primary pull-left'>Asignar Sprint</button></a>";
							?>
						</div>  
					</form>
			
			<div class="col-md-3">
				<a href="releases.php"><button class="btn btn-primary pull-left">Finalizar</button></a>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	
  }
?>