<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Responsive-->
	<title>Crear Proyectos</title>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<div class="container">
		<header class='encabezado'>
			<img src='resources/images/logo.png'>
			<h1>SCRUM</h1>
		</header>
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="insertar_proyecto.php" method="POST">
					<br>
				  <div class="form-group">
				    <label for="nombre_proyecto">Nombre del Proyecto:</label>
				    <input name="nombre_proyecto" type="text" class="form-control" id="nombre_proyecto" placeholder="Nombre">
				  </div>
				  <div class="form-group">
				    <label for="descripcion">Descripción</label>
					<textarea name="descripcion" class="form-control" rows="3"></textarea>				  </div>
				   <div class="form-group">
				    <label for="numero_release">Numero de Release:</label>
				    <input name="numero_release" type="text" class="form-control" id="numero_release" placeholder="#Release">
				    </div>
				     <button type="submit" class="btn btn-primary">Crear Proyecto</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>