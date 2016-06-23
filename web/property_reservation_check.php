<?php
session_start();
include 'conexion.php';
$reservasDePropiedad = "SELECT * FROM reserva_propiedad WHERE id_propiedad = '$_POST[prop]' AND estado = 1 ";
$result = mysql_query($reservasDePropiedad);
$count = mysql_num_rows($result);
$desde = $_POST['fecha1'];
$hasta = $_POST['fecha2'];
$desde = str_replace('/', '-', $desde);
$hasta = str_replace('/', '-', $hasta);
$desde = date('Y-m-d', strtotime($desde));
$hasta = date('Y-m-d', strtotime($hasta));
if ($count > 0){
	$reservasDePropiedad2 = "SELECT * FROM reserva_propiedad WHERE id_propiedad = '$_POST[prop]' AND (fecha_inicio_reserva BETWEEN '$desde' AND '$hasta') AND estado = 1";
	$result2 = mysql_query($reservasDePropiedad2);
	$count = mysql_num_rows($result2);
	if($count == 0){
		$reservasDePropiedad3 = "SELECT * FROM reserva_propiedad WHERE id_propiedad = '$_POST[prop]' AND (fecha_fin_reserva BETWEEN '$desde' AND '$hasta') AND estado = 1";
		$result3 = mysql_query($reservasDePropiedad3);
		$count = mysql_num_rows($result3);
		if($count == 0){
			$query = "INSERT INTO reserva_propiedad (estado, fecha_inicio_reserva, fecha_fin_reserva, id_huesped, id_propiedad) VALUES (0, '$desde', '$hasta', '$_SESSION[id_usuario]', '$_POST[prop]')";
 			if (!mysql_query($query, $conexion)){
 				die('Error: ' . mysql_error());
				echo "Error al solicitar la reserva." . "<br />";
 			}
 			else{
	 			mysql_close($conexion);
	 			$mensaje = "La solicitud de reserva fue enviada correctamente.";
				echo "<script>";
				echo "alert('$mensaje');";  
				echo "window.location.href='javascript:history.back(-2);'";
				echo "</script>";
	 			//header("Location: property_kind_list.php");  
			}
		}
		else{
			mysql_close($conexion);
	 		$mensaje = "Las fechas solicitadas no se encuentran disponibles.";
			echo "<script>";
			echo "alert('$mensaje');";  
			echo "window.location.href='javascript:history.back(-1);'";
			echo "</script>";
		}
	}
	else{
		mysql_close($conexion);
	 	$mensaje = "Las fechas solicitadas no se encuentran disponibles.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location.href='javascript:history.back(-1);'";
		echo "</script>";
	}
}
else{
	$query = "INSERT INTO reserva_propiedad (estado, fecha_inicio_reserva, fecha_fin_reserva, id_huesped, id_propiedad) VALUES (0, '$desde', '$hasta', '$_SESSION[id_usuario]', '$_POST[prop]')";
 	if (!mysql_query($query, $conexion)){
 		die('Error: ' . mysql_error());
		echo "Error al solicitar la reserva." . "<br />";
 	}
	else{
	 	mysql_close($conexion);
	 	$mensaje = "La solicitud de reserva fue enviada correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location = 'index.php';";
		echo "</script>";
	 	//header("Location: property_kind_list.php");  
	}
}
?>