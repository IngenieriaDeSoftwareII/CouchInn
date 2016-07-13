<?php
	session_start();
	include 'conexion.php';
	$eliminar = "DELETE FROM reserva_propiedad WHERE (id_reserva_propiedad = $_GET[id_reserva])";
	$result = mysql_query($eliminar);
	mysql_close($conexion);
	$mensaje = "La puntuacion ha sido cargada correctamente.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location='user_property_list.php'";
	echo "</script>";
?>