<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = ""; 
$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
$query = "UPDATE tipo_propiedad SET nombre = '$_POST[nombre]', descripcion = '$_POST[descripcion]' WHERE (id_tipo_propiedad = '$_POST[actualizar]')";
if (!mysql_query($query, $conexion)){
	die('Error: ' . mysql_error());
	echo "Error al actualizar informacion de tipo de la propiedad." . "<br />";
}
else{
	mysql_close($conexion);
	$mensaje = "El tipo de propiedad ha sido modificado correctamente.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'property_kind_list.php';";
	echo "</script>";
}

?>