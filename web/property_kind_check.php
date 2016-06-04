<?php
session_start();

include 'conexion.php';
$buscarTipoPropiedad = "SELECT * FROM tipo_propiedad WHERE nombre = '$_POST[nombre]' ";
$result = mysql_query($buscarTipoPropiedad);
$count = mysql_num_rows($result);
if ($count == 1){
	mysql_close($conexion);
	$mensaje = "Ya existe un tipo de propiedad con este nombre.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'property_kind.php';";
	echo "</script>";
}
else{
	$query = "INSERT INTO tipo_propiedad (nombre, descripcion) VALUES ('$_POST[nombre]', '$_POST[descripcion]')";
 	if (!mysql_query($query, $conexion)){
 		die('Error: ' . mysql_error());
		echo "Error al agregar tipo de propiedad." . "<br />";
 	}
	else{
	 	mysql_close($conexion);
	 	$mensaje = "El tipo de propiedad ha sido agregado correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location = 'property_kind.php';";
		echo "</script>";
	 	//header("Location: property_kind_list.php");  
	}
}
?>