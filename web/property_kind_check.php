<?php
session_start();

include 'conexion.php';
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