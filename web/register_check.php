<?php
session_start();

if (isset ($_SESSION['rol'])){
    header("Location: index.php");
}

$host_db = "localhost";
$user_db = "root";
$pass_db = "";

$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");;
$buscarUsuario = "SELECT * FROM usuario WHERE nombre_usuario = '$_POST[username]' ";
$result = mysql_query($buscarUsuario);
$count = mysql_num_rows($result);
if ($count == 1){
	echo "<br />". "El Nombre de Usuario ya Existe en nuestra Base de Datos!" . "<br />";
	echo "<a href='register.php'>Escoger otro Nombre de Usuario</a>";
	exit;
}
else{
	$exist = "SELECT * FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]'";
	$result2 = mysql_query($exist);
	$count2 = mysql_num_rows($result2);
	if ($count2 == 0){
		$query2 = "INSERT INTO ubicacion (calle, numero, piso, departamento, ciudad, provincia, pais, codigo_postal) VALUES ('$_POST[calle]', '$_POST[numero]','$_POST[piso]', '$_POST[departamento]','$_POST[ciudad]', '$_POST[provincia]','$_POST[pais]','$_POST[codigo_postal]')";
 		mysql_query($query2);
 	}
 	// $ubicacion = "SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')";
	$query = "INSERT INTO usuario (nombre_usuario, contrasena, nombre, apellido, dni, email, telefono, id_ubicacion, rol) VALUES ('$_POST[username]', '$_POST[password]','$_POST[nombre]', '$_POST[apellido]','$_POST[dni]', '$_POST[email]','$_POST[telefono]', (SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')), 1)";
	if (!mysql_query($query, $conexion)){
 		die('Error: ' . mysql_error());
 		echo "Error al crear el usuario." . "<br />";
 	}
 	else{
 		mysql_close($conexion);
	 	$mensaje = "El registro ha sido completado con exito! Ya puede iniciar sesion con su nombre de usuario y contraseña";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location = 'login.php';";
		echo "</script>";
	}
}
mysql_close($conexion)
?>
