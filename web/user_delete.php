<?php
session_start();
session_destroy();

	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";

	$conexion = mysql_connect($host_db, $user_db, $pass_db);
	mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");

	$eliminar_ubicacion_usuario = "SELECT id_ubicacion FROM usuario WHERE (id_usuario = '$_SESSION[id_usuario]')";
	$ubic = mysql_query($eliminar_ubicacion_usuario);
	$row = mysql_fetch_assoc($ubic);

	$eliminarUbicacion = "DELETE FROM ubicacion WHERE (id_ubicacion = $eliminar_ubicacion_usuario)";
	$result = mysql_query($eliminarUbicacion);

	$eliminar_usuario = "DELETE FROM usuario WHERE (id_usuario = '$_SESSION[id_usuario]')";
	$result2 = mysql_query($eliminar_usuario);

	mysql_close($conexion);
	//header("Location: index.php");	
?>