<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = ""; 

$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
$buscarTipoPropiedad = "SELECT * FROM tipo_propiedad WHERE nombre = '$_POST[nombre]' ";
$result = mysql_query($buscarTipoPropiedad);
$count = mysql_num_rows($result);
if ($count == 1){
	echo "<br />". "El Tipo de Propiedad ya Existe en nuestra Base de Datos!" . "<br />";
	echo "<a href='property_kind.php'>Escoger otro Nombre de Tipo de Propiedad</a>";
	exit; 
}
else{
	$query = "INSERT INTO tipo_propiedad (nombre, descripcion) VALUES ('$_POST[nombre]', '$_POST[descripcion]')";
 	if (!mysql_query($query, $conexion)){
 		die('Error: ' . mysql_error());
		echo "Error al agregar tipo de propiedad." . "<br />";
 	}
	else{
	 		echo "Se agrego exitosamente" . "<br />";
		exit;
	}
}
mysql_close($conexion);
?>