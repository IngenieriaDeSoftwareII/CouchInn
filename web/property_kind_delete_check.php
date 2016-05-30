<?php

session_start();

$host_db = "localhost";
$user_db = "root";
$pass_db = "";

$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");;
$eliminarTipoPropiedad = "DELETE * FROM tipo_propiedad WHERE (nombre = '$_POST[nombre]') AND (descripcion = '$_POST[nombre]')";
$result = mysql_query($eliminarTipoPropiedad);
header("Location: property_kind_list_check");
mysql_close($conexion)
?>
