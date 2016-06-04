<?php
session_start();
include 'conexion.php';

$query = "SELECT * FROM tipo_propiedad WHERE nombre = '$_POST[nombre]'";
$result = mysql_query($query);
$count = mysql_num_rows($result);
if ($count == 1){
	mysql_close($conexion);
	$mensaje = "Ya existe un tipo de propiedad con este nombre.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'property_kind_list.php';";
	echo "</script>";
}
else{
	$modificacion = "UPDATE tipo_propiedad SET nombre = '$_POST[nombre]', descripcion = '$_POST[descripcion]' WHERE (id_tipo_propiedad = '$_POST[actualizar]')";
	if (!mysql_query($modificacion, $conexion)){
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
}


?>