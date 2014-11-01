<?php


include("system/conect.php");
//ESTA ES PARA ENVIAR CORREO A  MIEMBROS
$id_proyecto = $_SESSION["proyecto"]; //Se define la variable proyecto

$query ="SELECT m.CorreoMiembro FROM miembro m inner join miembro_por_proyecto mp on m.idMiembro = mp.idMiembro where mp.idProyecto = $id_proyecto";
$result_query = $mysqli->query($query);//Se ejecuta la query


//Mae esta es la consulta para jalar la tabla de correos de determinado proyecto
//Ahora como lo que se necesita es mandar correo a todos los miembros de ese proyecto se recorre la tabla con fetch_array en un while
while ($row_ = $result_query->fetch_array(MYSQLI_ASSOC)) {
	$correo = $row["CorreoMiembro"]; // se iguala el correo a una variable

	//Aqui se pone lo que hace que envie el correo, enviandolo a el correo asociado a la variable $correo
//TERMINA AQUI
}




//ESTA ES PARA ENVIAR CORREO A  INTERESADOS
$id_proyecto = $_SESSION["proyecto"]; //Se define la variable proyecto

$query ="SELECT i.CORREOINTERESADO FROM interesado i inner join relationship_3 r on i.IDINTERESADOS = r.IDINTERESADOS where r.idProyecto = $id_proyecto";
$result_query = $mysqli->query($query);//Se ejecuta la query


//Mae esta es la consulta para jalar la tabla de correos de determinado proyecto
//Ahora como lo que se necesita es mandar correo a todos los miembros de ese proyecto se recorre la tabla con fetch_array en un while
while ($row_ = $result_query->fetch_array(MYSQLI_ASSOC)) {
	$correo = $row["CORREOINTERESADO"]; // se iguala el correo a una variable

	//Aqui se pone lo que hace que envie el correo, enviandolo a el correo asociado a la variable $correo
//TERMINA AQUI
}
?>