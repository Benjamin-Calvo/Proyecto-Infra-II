<?php
  session_start();
  if (!isset($_SESSION["logged_in"])) {
    header("location: ../system/login.php");
  } 
  else {
  	$id_proyecto = $_SESSION["proyecto"];
    $id_sprint = $_GET["id_sprint"];

  include("../system/conect.php");
  $query = "SELECT IdRelease, FechaInicioS, FechaFinalS, Num_Sprint FROM sprint where IdSprint=$id_sprint"; 
  $result = $mysqli->query($query);


  $row = $result->fetch_array(MYSQLI_ASSOC);

  $FechaInicio = $row["FechaInicioS"];
  $FechaFinal = $row["FechaFinalS"]; 
  $id_release = $row["IdRelease"];

  $partirFechaTiempo = explode(" ",$FechaInicio); 

  $fecha = $partirFechaTiempo[0];
  $partirFecha = explode("-",$fecha); 
  $anio_inicio = $partirFecha[0]; 
  $mes_inicio = $partirFecha[1];
  $dia_inicio = $partirFecha[2]; 

  $partirFechaTiempo = explode(" ",$FechaFinal); 

  $fecha = $partirFechaTiempo[0];
  $partirFecha = explode("-",$fecha); 
  $anio_final = $partirFecha[0]; 
  $mes_final = $partirFecha[1];
  $dia_final = $partirFecha[2]; 



?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Sprint</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
    <!--<script src="resources/js/bootstrap.min.js" language="javascript" type="text/javascript"></script>-->
</head>
<body>
	<?php
    include("../system/encabezado.php");
  ?>
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="../acciones/modificar_sprint.php" method="POST">  <!--Esto es lo que hace que el boton llame a insersprint-->
					<br>
          <div class="col-md-12">
				   	<div class="form-group">
				    	<label for="numero_sprint">Numero de Sprint:</label>
				    	<?php echo"<input name='numero_sprint' type='text' class='form-control minimizar_ancho' id='numero_sprint' value='".$row["Num_Sprint"]."'>"; ?>
				    </div>
          </div>
				    <div class="col-md-12">
          		    	<label for="fecha de inicio">Fecha de inicio:</label>
          		    </div>
            		<div class="col-md-1">
          		        <label for="dia">Día:</label>
            		</div>

            		<div class="col-md-2">
                  <?php
          		      echo "<input name='dia' type='text' class='form-control' id='dia' placeholder='Dia' value='$dia_inicio'>";
                  ?>
            		</div>
            		<div class="col-md-1">
          		        <label for="mes">Mes:</label>
            		</div>
            		<div class="col-md-2">
                  <?php
          		      echo "<input name='mes' type='text' class='form-control' id='mes' placeholder='Mes' value='$mes_inicio'>"
                  ?>
            		</div>
            		<div class="col-md-1">
          		        <label for="anno">Año:</label>
            		</div>
            		<div class="col-md-2">
                  <?php
          		        echo "<input name='anno' type='text' class='form-control' id='anno' placeholder='Año' value='$anio_inicio'>"
                      ?>
            		</div>
            		<br>
            		<div class="col-md-12">
            			<br>
            			<label for="fecha de final">Fecha de final:</label>
            		</div>
            		<div class="col-md-1">
          		        <label for="dia1">Día:</label>
            		</div>
            		<div class="col-md-2">
                  <?php
          		        echo"<input name='dia1' type='text' class='form-control' id='dia1' placeholder='Dia' value='$dia_final'>"
                  ?>
            		</div>
            		<div class="col-md-1">
          		        <label for="mes1">Mes:</label>
            		</div>
            		<div class="col-md-2">
                  <?php
          		        echo "<input name='mes1' type='text' class='form-control' id='mes1' placeholder='Mes' value='$mes_final'>"
                  ?>
            		</div>
            		<div class="col-md-1">
          		        <label for="anno1">Año:</label>
            		</div>
            		<div class="col-md-2">
                  <?php
          		        echo"<input name='anno1' type='text' class='form-control' id='anno1' placeholder='Año' value='$anio_final'>"
                  ?>
            		</div>

            		<div class="col-md-3 invisible">
                  <input type="text" class="form-control" value="hola soy una entrada invisible nadie me va ver">
                </div>

                <div class="col-md-2">
                  <br>
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <?php echo "<input name='id_sprint' type='hidden' value='".$id_sprint."'>"; ?>
                <?php echo "<input name='id_release' type='hidden' value='".$id_release."'>"; ?>
				</form>
        <div class="col-md-2">
          <br>
          <?php echo "<a href='sprints.php?id_release=".$id_release."'><button class='btn btn-primary pull-left'>Cancelar</button></anno1>"; ?>
        </div>
            
			</div>
		</div>
	</div>
</body>
</html>
<?php
	
  }
?>