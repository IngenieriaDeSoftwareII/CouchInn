<?php

	include 'conexion.php';
    $eliminarReserva = "DELETE FROM reserva_propiedad WHERE (id_reserva_propiedad =  $_POST[cancelar])";
    $result = mysql_query($eliminarReserva);
    mysql_close($conexion);
    header("Location:user_reservations_list.php");
	?>