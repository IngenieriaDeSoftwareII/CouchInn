// <?php
// session_start();
// include 'conexion.php';

// $query = "SELECT * FROM reserva_propiedad WHERE id_reserva_propiedad = '$_POST[id_reserva]'"
// $result = mysql_query($query);
// $id_huesped = $result['id_huesped'];
// $query1 = "SELECT * FROM tipo_propiedad WHERE nombre = '$_POST[nombre]'";
// $result1 = mysql_query($query1);
// $count = mysql_num_rows($result1);
// if ($count == 1){
// 	$agregar = "INSERT INTO puntaje_huesper (puntaje, id_reserva, id_usuario) VALUES ('$_POST[puntaje]', '$_POST[id_reserva]','$id_huesped')";
// 	mysql_close($agregar);
// 	$mensaje = "La puntuacion ha sido cargada correctamente.";
// 	echo "<script>";
// 	echo "alert('$mensaje');";  
// 	echo "window.location.href='javascript:history.back(-1);'";
// 	echo "</script>";
// }
// else{
// 	$modificacion = "UPDATE puntaje_huesped SET puntaje = '$_POST[puntaje]' WHERE (id_reserva = '$_POST[id_reserva]')";
// 	mysql_query($modificacion);
// 	mysql_close($conexion);
// 	$mensaje = "La puntuacion ha sido cargada correctamente.";
// 	echo "<script>";
// 	echo "alert('$mensaje');";  
// 	echo "window.location.href='javascript:history.back(-1);'";
// 	echo "</script>";
// 	}
// }


// ?>