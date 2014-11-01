<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_GET["id_proyecto"];
  	
	include("../system/conect.php");
	
	$query = "SELECT m.NombreMiembro, m.ApellidoMiembro, mp.Rol FROM miembro m inner join miembro_por_proyecto mp on m.idMiembro = mp.idMiembro where mp.idProyecto = $id_proyecto"; 
	$result = $mysqli->query($query);	
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Equipo</title>
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
				<h1 class='page-header'>Equipo</h1>
				<table class="table table-striped table-hover">
					<thead>
						<th><H3>Nombre</H3></th>
						<th><H3>Rol</H3></th>
					</thead>
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
								echo "<tr><td>".$row["NombreMiembro"]." ".$row["ApellidoMiembro"]."</td> 
								<td>".$row["Rol"]."</td> </tr>";
							}
						}
					?>
					</tbody>
				</table>
				
				
			</div>
			<div class="col-md-2">
				<a href='index.php'><button class='btn btn-primary pull-left'>Proyectos</button></a>
			</div>

		</div>
	</div>
</body>
</html>


