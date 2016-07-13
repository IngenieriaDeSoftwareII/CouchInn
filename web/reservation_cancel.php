<?php
	include 'conexion.php';
	$query = "UPDATE reserva_propiedad SET estado = 3 WHERE (id_reserva_propiedad =  $_GET[id_reserva])";
    mysql_query($query);
    mysql_close($conexion);
		echo "<script>";
		echo "window.location='user_property_list.php'";
		echo "</script>";
?>