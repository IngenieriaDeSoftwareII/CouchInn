<?php

session_start();

$host_db = "localhost";
$user_db = "root";
$pass_db = ""; 

$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");

$query = "UPDATE usuario SET nombre = '$_POST[nombre]', apellido = '$_POST[apellido]', dni = '$_POST[dni]', contrasena = '$_POST[password]', telefono = '$_POST[telefono]', email = '$_POST[email]' WHERE (id_usuario = '$_SESSION[id_usuario]')";


$result = mysql_query("SELECT id_ubicacion FROM usuario WHERE id_usuario = '$_SESSION[id_usuario]'");

$usuario_id_ubicacion = mysql_fetch_assoc($result);

$query2 = "UPDATE ubicacion SET calle = '$_POST[calle]', numero = '$_POST[numero]', piso = '$_POST[piso]', departamento = '$_POST[departamento]', pais = '$_POST[pais]', provincia = '$_POST[provincia]', ciudad = '$_POST[ciudad]', codigo_postal = '$_POST[codigo_postal]' WHERE (id_ubicacion =  $usuario_id_ubicacion[id_ubicacion])"; 



mysql_query($query, $conexion);
mysql_query($query2, $conexion);
mysql_close($conexion);
$mensaje = "Su información personal ha sido modificada con exito.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'user_data_list.php';";
echo "</script>";
// if ((!mysql_query($query, $conexion)) AND (!mysql_query($query2, $conexion))){
// 	die('Error: ' . mysql_error());
// 	echo "Error al actualizar informacion personal del usuario." . "<br />";
// }
// else{
// 	header("Location: user_data_list.php");
// 	exit;
// }


?>
