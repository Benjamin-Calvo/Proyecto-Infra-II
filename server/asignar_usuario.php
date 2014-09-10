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
				    <H3 for="nombre_proyecto">Nombre del Proyecto:</H3>
				    <label for="nombre_proyecto">(Aqui va el nombre)</label>
				    <H3 for="descripcion">Descripción:</H3>
					<label for="descripcion">(Aqui va la descripcion)</label>
					</div>
				   <div class="form-group" id="select_po">
				    <H3 for="product_owner">Product Owner:</H3>
				    <select class="form-control">
					  <option>1</option>
					</select>
				    </div>
				   <div class="form-group" id="select_sm">
				    <H3 for="scrum_master">Scrum Master:</H3>
				    <select class="form-control">
					  <option>1</option>
					</select>
				    </div>
				    <div class="form-group" id="select_dt">
				    <H3 for="developer_tester">Developer/Tester:</H3>
				    <select multiple class="form-control">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
				    </div>
				     <button type="submit" class="btn btn-primary">Crear Usuario</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>