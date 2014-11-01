<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	//$id_proyecto = $_SESSION["proyecto"];
  	$id_us = $_GET["id_us"];
  	$id_sprint = $_GET["id_sprint"];
	include("../system/conect.php");
	
	$query = "SELECT descripcioncriterio, idcriterio, estadoCriterio FROM criterio WHERE IdUS = $id_us"; 
	$result = $mysqli->query($query);	
	
 	 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Criterios</title>
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
				<h1 class='page-header'>Criterios de Aceptacion</h1>
				<table class="table table-striped table-hover">
					<tbody>
					<?php
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
							$estado = "";
							if ($row["estadoCriterio"]==1) {
								$estado = "checked";
							} 
								echo "<tr><div class="."checkbox".">
    								<label>
     								 <input $estado type="."checkbox name=".$row["idcriterio"]." onchange='toggle_state(this,".$row["idcriterio"].")'>".$row["idcriterio"]."-".$row["descripcioncriterio"]."
    								</label>
  								</div></tr>";
								  
							}

						}
					?>
					</tbody>
				</table>
				
				
			</div>
			

			<div class="col-md-2">
				<?php
					echo "<a href='crear_criterio_aceptacion.php?id_us=".$id_us."&id_sprint=".$id_sprint."'><button class='btn btn-primary pull-left'>Crear Criterio</button></a>"; 
				?>
					
			</div>

			<div class="col-md-2">
				<?php
					echo "<a href='us_sprint.php?id_sprint=".$id_sprint."'><button class='btn btn-primary pull-left'>Volver</button></a>";
				?>
			</div>

		</div>
	</div>
	<script type="text/javascript" src="resources/js/jquery.min.js"></script>
	<script	type = "text/javascript">
		function toggle_state(element,id){
			var estado = element.checked;
			var id_criterio = id;
			$.ajax({
				url:"toggle_state.php",
				data:{state:estado, id:id_criterio},
				method: "GET",
				success: function(data){
					if (data!="ok") {
						alert("Error en ajax!");
						alert(data);
					};
					
				},
				error: function(data) {
					alert(data);
				}
			});
		}

	</script>
</body>
</html>

