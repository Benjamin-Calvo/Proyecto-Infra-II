<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	include("../system/conect.php");
  	
  	$id_proyecto = $_SESSION["proyecto"];
  	
  	$rol = $_SESSION["rol"];
  	
  	if ($rol == "DT"){
		$query = "SELECT Num_sprint, IdSprint FROM sprint where IdProyecto=$id_proyecto"; 
		$result = $mysqli->query($query);
	}
	else {
  		$id_release = $_GET["id_release"];
	
	
		$query = "SELECT Num_sprint, IdSprint FROM sprint where IdRelease=$id_release"; 
		$result = $mysqli->query($query);	

		$query_release = "SELECT NumRelease FROM releases where IdRelease=$id_release"; 
		$result_release = $mysqli->query($query_release);	
		$row = $result_release->fetch_array(MYSQLI_ASSOC);
		$num_release = $row["NumRelease"];
	}
	
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<?php
	 	if ($rol == "DT"){
	 		echo"<title>Sprints</title>";
	 	}
	 	else {
	 		echo"<title>Release ".$num_release."</title>"; 
	 	}
	 ?>
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
				<h1 class='page-header'>Sprints</h1>
				<table class="table table-striped table-hover">

					<?php

						if ($rol == "DT"){
							echo "<thead>
									<th><H3>Ver user stories</H3></th>
								</thead>";
						}
						else { // En este caso el otro seria Scrum Master
							echo "<thead>
									<th><H3>Ver user stories</H3></th>
									<th><H3>Asignar user stories</H3></th>
									<th><H3>Editar sprint</H3></th>
									<th><H3>Ver grafica</H3></th>
								</thead>";
						}
					?>

					<tbody>
					<?php
						while ($row_sprint = $result->fetch_array(MYSQLI_ASSOC)) {
							if ($rol == "DT")
							{
								echo "<tr><td><a href='us_sprint.php?id_sprint=".$row_sprint["IdSprint"]."'>Sprint  ".$row_sprint["Num_sprint"].
								"</a></td>" ;
							}
								
							else {
								echo "<tr><td><a href='us_sprint.php?id_sprint=".$row_sprint["IdSprint"]."'>Sprint  ".$row_sprint["Num_sprint"]."</a></td> 
								<td><a href='asignar_us.php?id_sprint=".$row_sprint["IdSprint"]."&num_sprint=".$row_sprint["Num_sprint"]."'><i class='glyphicon glyphicon-plus'></i></td> 
								<td><a href='editar_sprint.php?id_sprint=".$row_sprint["IdSprint"]."'><i class='glyphicon glyphicon-pencil'></i></td> <td><a href='../acciones/datos_grafico.php?id_sprint=".$row_sprint["IdSprint"]."'><i class='glyphicon glyphicon-stats'></i></td></tr>";
							}

							}
						}
					?>
					</tbody>
				</table>
				
				
			</div>
			<div class="col-md-12">
				<?php 
				if ($rol == "DT"){
					echo "<a href='editar_proyecto.php?id_proyecto=".$id_proyecto."'><button class='btn btn-primary pull-left col-md-2'>Listo</button></a>";

				}
				else {
					echo "<a href='releases.php'><button class='btn btn-primary pull-left col-md-2'>Listo</button></a>";
				}

					?>
			
			</div>
			

		</div>
	</div>
</body>
</html>

