<?php
session_start();
session_destroy();

	include 'conexion.php';

	$eliminar_usuario = "DELETE FROM usuario WHERE (id_usuario = '$_SESSION[id_usuario]')";
	$result2 = mysql_query($eliminar_usuario);

	mysql_close($conexion);
	$mensaje = "El usuario ha sido eliminado con exito.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'index.php';";
	echo "</script>";
?>