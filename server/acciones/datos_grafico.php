<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    echo "Error en el isset";;
 
  } 




  else {
  	$id_proyecto = $_SESSION["proyecto"];
  	$id_sprint = $_GET["id_sprint"];
  	//echo $id_proyecto."  ". $id_sprint;
	include("../system/conect.php"); 

	$horas = array();
	$dias = array();
	$var = 1;

	//Total en horas del sprint 
	$query = "SELECT sum(us.HORASPLAN) as suma from userstorie us inner join sprint s on us.idproyecto = s.idproyecto where s.idproyecto = '$id_proyecto' ";
	$result_query = $mysqli->query($query);
	$row = $result_query->fetch_array(MYSQLI_ASSOC);
	$Horas_Sprint = $row["suma"];

	// Total en dias del sprint
	$query2 = "SELECT diashabiles from sprint where idsprint = $id_sprint ";
	$result_query2 = $mysqli->query($query2);
	$row = $result_query2->fetch_array(MYSQLI_ASSOC);
	$Dias_Sprint = $row["diashabiles"];

	//Cuanttos dias se  han tranajado de ese sprint
	$query3 = "SELECT max(ac.diafinal) as diafinal from actividad ac inner join userstorie us on us.idus = ac.idus  where us.idproyecto = '$id_proyecto' and us.idsprint = '$id_sprint' ";
	$result_query3 = $mysqli->query($query3);
	$row = $result_query3->fetch_array(MYSQLI_ASSOC);
	$Dias_trabajados = $row["diafinal"];

	//Ciclo que va desde  1 hasta el final de los dias que ya han sido trabajados 
	while($var!=$Dias_trabajados +1){
		//Sacamos las horas trabajadas en el dia = $var
		$query4 = "SELECT sum(tiemporeal) as tiemporeal from actividad WHERE  diafinal = '$var' ";
		$result_query4 = $mysqli->query($query4);
		$row = $result_query4->fetch_array(MYSQLI_ASSOC);
		$sum_dia = $row["tiemporeal"];
		$result = $Horas_Sprint - $sum_dia ;
		//Se agrega a los arreglos los dias y las horas
		array_push($horas, $result);
		array_push($dias, $var);
		$var = $var +1;
		
		$Horas_Sprint = $Horas_Sprint - $sum_dia ;


	}
	//Para pruebas
	echo "[  ".$horas[0]." , ".$horas[1]." , ".$horas[2]." , ".$horas[3]."]";
	echo "<br>";
	echo "[  ".$dias[0]." , ".$dias[1]." , ".$dias[2]." , ".$dias[3]."]";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Interesados</title>
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
				
				

			</div>
			
			<div class="col-md-2">
				<?php
					echo "<a href='editar_proyecto.php?id_proyecto=".$id_proyecto."'><button class='btn btn-primary pull-left'>Proyecto</button></a>";
				?>
			</div>
		</div>
	</div>
</body>
</html>

<?php }?>