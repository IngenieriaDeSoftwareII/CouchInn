<?php
	session_start();
	include 'conexion.php';
	$query = mysql_query("SELECT * FROM reserva_propiedad WHERE id_reserva_propiedad = $_POST[id_reserva]");
	$result = mysql_fetch_array($query);
	$id_propiedad = $result['id_propiedad'];
	$query2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = $id_propiedad");
	$result2 = mysql_fetch_array($query2);
	$id_propietario = $result2['id_usuario'];
	$query1 = "SELECT * FROM puntaje_propietario WHERE id_reserva = '$_POST[id_reserva]'";
	$result1 = mysql_query($query1);
	$count = mysql_num_rows($result1);
	if ($count == 0){
		$agregar = "INSERT INTO puntaje_propietario (puntaje, id_usuario, id_reserva) VALUES ('$_POST[puntajepropietario]', '$id_propietario', '$_POST[id_reserva]')";
		mysql_query($agregar);
	}
	else{
		$modificacion = "UPDATE puntaje_propietario SET puntaje = '$_POST[puntajepropietario]' WHERE (id_reserva = '$_POST[id_reserva]')";
		mysql_query($modificacion);
	}
	$query3 = "SELECT * FROM puntaje_propiedad WHERE id_reserva = '$_POST[id_reserva]'";
	$result3 = mysql_query($query3);
	$count3 = mysql_num_rows($result3);
	if ($count3 == 0){
		$agregar2 = "INSERT INTO puntaje_propiedad (puntaje, id_propiedad, id_reserva) VALUES ('$_POST[puntajepropiedad]', '$id_propiedad', '$_POST[id_reserva]')";
		mysql_query($agregar2);
		mysql_close($conexion);
		$mensaje = "Las puntuaciones han sido actualizadas correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location='user_reservations_list.php'";
		echo "</script>";
	}
	else{
		$modificacion2 = "UPDATE puntaje_propiedad SET puntaje = '$_POST[puntajepropiedad]' WHERE (id_reserva = '$_POST[id_reserva]')";
		mysql_query($modificacion2);
		mysql_close($conexion);
		$mensaje = "Las puntuaciones han sido actualizadas correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location='user_reservations_list.php'";
		echo "</script>";
	}
?>