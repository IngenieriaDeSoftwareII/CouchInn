<?php
	include 'conexion.php';
	$query = "UPDATE reserva_propiedad SET estado = 3 WHERE (id_reserva_propiedad =  $_GET[id_reserva_propiedad])";
    $result = mysql_query($query);
    mysql_close($conexion);
    header("Location:user_reservations_list.php");
?>