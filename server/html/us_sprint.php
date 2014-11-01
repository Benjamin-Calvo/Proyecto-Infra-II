<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	
  	$rol = $_SESSION["rol"];
  	$id_sprint = $_GET["id_sprint"];
  	
	include("../system/conect.php");
	
	$query = "SELECT Num_Sprint, IdRelease FROM sprint where IdSprint=$id_sprint"; 
	$result = $mysqli->query($query);//Esta en result los numero sprint
	$row1 = $result->fetch_array(MYSQLI_ASSOC);

	$query_us = "SELECT IdUS, DescripcionUS FROM userstorie WHERE idsprint = $id_sprint"; 
	$result_us = $mysqli->query($query_us);

	$rol = $_SESSION["rol"];


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<?php echo "<title>Sprint ".$row1["Num_Sprint"]."</title>";?>
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
				<?php echo"<h1 class='page-header'>Sprint: ".$row1["Num_Sprint"]."</h1>";?>
				<!--<H3>User Stories</H3>-->
				<table class="table table-striped table-hover">
					

					
					<?php

						if ($rol == "DT"){
							echo "<thead>
									<th><H3>User Stories</H3></th>
									<th><H3>Ver tareas</H3></th>
									<th><H3>Ver criterios</H3></th>
								</thead>";
						}
						else { // En este caso el otro seria Scrum Master
							echo "<thead>
									<th><H3>User Stories</H3></th>
									<th><H3>Asociar encargado</H3></th>
									<th><H3>Desligar user story</H3></th>
								</thead>";
						}
					?>
					<tbody>
					
					<?php
						while ($row = $result_us->fetch_array(MYSQLI_ASSOC)) {
							if ($rol == "DT"){
								echo "<tr><td>".$row["DescripcionUS"]."</td>
								          <td><a href='tareas.php?id_us=".$row["IdUS"]."&id_sprint=".$id_sprint."'><i class='glyphicon glyphicon-tasks'></i></td>
								          <td><a href='criterios_aceptacion.php?id_us=".$row["IdUS"]."&id_sprint=".$id_sprint."'><i class='glyphicon glyphicon-list-alt'></i></td>  
								      </tr>";
							}
							else {
								echo "<tr><td>".$row["DescripcionUS"]."</td>
										  <td><a href='asignar_DT.php?id_us=".$row["IdUS"]."&id_sprint=".$id_sprint."'><i class='glyphicon glyphicon-user'></i></td>
								 		  <td><a href='../acciones/desenlazar_us.php?id_us=".$row["IdUS"]."&id_sprint=".$id_sprint."'><i class='glyphicon glyphicon-remove'></i></td>
								 	  </tr>";
							}
						}
					}
					?>
					</tbody>
				</table>	
			</div>
			<div class="col-md-2">
				<?php echo "<a href='sprints.php?id_release=".$row1["IdRelease"]."'><button class='btn btn-primary pull-left col-md-12'>Listo</button></a>"; ?>
			</div>
		</div>
	</div>
</body>
</html>

