<?php
	include 'conexion.php';
	// ESTO SERIA PARA RECHAZAR TODAS LAS QUE SE ENCUENTREN ENTRE LAS FECHAS DE LA ACEPTADA, NO ESTA FUNCIONANDO EL SELECT ENTRE FECHAS.
	// $query = mysql_query("SELECT * FROM reserva_propiedad WHERE id_reserva_propiedad = $_GET[id_reserva]");
	// $result = mysql_fetch_array($query);
	// $query2 = mysql_query("SELECT * FROM reserva_propiedad WHERE (id_propiedad = $result[id_propiedad]) AND ((fecha_inicio_reserva BETWEEN $result[fecha_inicio_reserva] AND $result[fecha_fin_reserva]) OR (fecha_fin_reserva BETWEEN $result[fecha_inicio_reserva] AND $result[fecha_fin_reserva]))");
	// while ($result2 = mysql_fetch_array($query2)){
	// 	$query3 = "UPDATE reserva_propiedad SET estado = 3 WHERE (id_reserva_propiedad = $result2[id_reserva_propiedad])";
 //    	mysql_query($query3);
 //    }
	$query4 = "UPDATE reserva_propiedad SET estado = 1 WHERE (id_reserva_propiedad =  $_GET[id_reserva])";
    mysql_query($query4);
    mysql_close($conexion);
	echo "<script>";
	echo "window.location='user_property_list.php'";
	echo "</script>";
?>