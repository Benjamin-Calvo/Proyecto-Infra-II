<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	
	include("../system/conect.php"); 
	
	$query = "SELECT IDRIESGO, DESCRIPCIONBREVE FROM riesgo WHERE idProyecto=$id_proyecto"; 
	$result = $mysqli->query($query);	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Riesgos</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
</head>
<body>
	<?php
		include("../system/encabezado.php");
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class='page-header'>Riesgos</h1>
				<table class="table table-striped table-hover">
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td>".$row["IDRIESGO"]."  ".$row["DESCRIPCIONBREVE"]."</td></tr>";
								}
						}
					?>
					</tbody>
				</table>	
			</div>
			<div class="col-md-2">
				<a href="crear_riesgo.php"><button class="btn btn-primary pull-left">Agregar Riesgo</button></a>
			</div>
			<div class="col-md-2">
				<?php
					echo "<a href='editar_proyecto.php?id_proyecto=".$id_proyecto."'><button class='btn btn-primary pull-left'>Regresar</button></a>";
				?>
			</div>
		</div>
	</div>
</body>
</html>

