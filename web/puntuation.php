<?php
	session_start();
	include 'conexion.php';
	$query = mysql_query("SELECT * FROM reserva_propiedad WHERE id_reserva_propiedad = $_POST[id_reserva]");
	$result = mysql_fetch_array($query);
	$id_huesped = $result['id_huesped'];
	$query1 = "SELECT * FROM tipo_propiedad WHERE nombre = '$_POST[nombre]'";
	$result1 = mysql_query($query1);
	$count = mysql_num_rows($result1);
	if ($count == 0){
		$agregar = "INSERT INTO puntaje_huesped (puntaje, id_reserva, id_usuario) VALUES ('$_POST[puntaje]', '$_POST[id_reserva]', '$result[id_huesped]')";
		mysql_query($agregar);
		mysql_close($conexion);
		$mensaje = "La puntuacion ha sido cargada correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location='user_property_list.php'";
		echo "</script>";
	}
	else{
		$modificacion = "UPDATE puntaje_huesped SET puntaje = '$_POST[puntaje]' WHERE (id_reserva = '$_POST[id_reserva]')";
		mysql_query($modificacion);
		mysql_close($conexion);
		$mensaje = "La puntuacion ha sido modificada correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location='user_property_list.php'";
		echo "</script>";
	}
?>