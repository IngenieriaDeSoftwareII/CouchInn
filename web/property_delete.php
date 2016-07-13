<?php

include 'conexion.php';

$eliminarFoto = "DELETE FROM foto WHERE (id_propiedad = $id_propiedad)";
$result = mysql_query($eliminarFoto);
        
$eliminarPreguntas = "DELETE FROM pregunta WHERE (id_propiedad = $id_propiedad)";
$result2 = mysql_query($eliminarPreguntas);

$eliminarReservas = "DELETE FROM reserva_propiedad WHERE (id_propiedad = $id_propiedad)";
$result3 = mysql_query($eliminarReservas);

$eliminarPropiedad = "DELETE FROM propiedad WHERE (id_propiedad = $id_propiedad)";
$result4 = mysql_query($eliminarPropiedad);

mysql_close($conexion);
$mensaje = "La propiedad ha sido eliminado con exito.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'user_property_list.php';";
echo "</script>";

?>