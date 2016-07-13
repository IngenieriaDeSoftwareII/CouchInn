<?php

session_start();

include 'conexion.php';

$query = "UPDATE pregunta SET respuesta = '$_POST[res]' WHERE (id_pregunta = '$_POST[actualizar]')";

mysql_query($query, $conexion);
mysql_close($conexion);
$mensaje = "Se agrego la respuesta con exito.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'user_property_list.php';";
echo "</script>";
?>