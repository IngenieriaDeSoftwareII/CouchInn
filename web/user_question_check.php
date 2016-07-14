<?php

session_start();

include 'conexion.php';

$uno = $_POST['preg'];
$dos = $_SESSION['id_usuario'];
$tres = $_POST['propiedad'];
echo $uno;
echo $dos;
echo $tres;

mysql_query("INSERT INTO pregunta(descripcion,id_usuario,id_propiedad) VALUES('$uno',$dos,$tres)");
mysql_close($conexion);
$mensaje = "Se envio la pregunta con exito.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'user_property_list.php';";
echo "</script>";
?>