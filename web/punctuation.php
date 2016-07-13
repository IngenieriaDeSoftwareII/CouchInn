<?php
	session_start();
	include 'conexion.php';
	$query = mysql_query("SELECT * FROM reserva_propiedad WHERE id_reserva_propiedad = $_POST[id_reserva]");
	$result = mysql_fetch_array($query);
	$id_huesped = $result['id_huesped'];
	$agregar = "INSERT INTO puntaje_huesped (puntaje, id_reserva, id_usuario) VALUES ('$_POST[puntaje]', '$_POST[id_reserva]', '$result[id_huesped]')";
	mysql_query($agregar);
	mysql_close($conexion);
	$mensaje = "La puntuacion ha sido cargada correctamente.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location='user_property_list.php'";
	echo "</script>";
?>