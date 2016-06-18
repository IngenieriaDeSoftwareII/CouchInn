<?php
session_start();
echo $_SESSION['id_usuario'];

// include 'conexion.php';
// 	$exist = "SELECT * FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]'";
// 	$result2 = mysql_query($exist);
// 	$count2 = mysql_num_rows($result2);
// 	if ($count2 == 0){
// 		$query2 = "INSERT INTO ubicacion (calle, numero, piso, departamento, ciudad, provincia, pais, codigo_postal) VALUES ('$_POST[calle]', '$_POST[numero]','$_POST[piso]', '$_POST[departamento]','$_POST[ciudad]', '$_POST[provincia]','$_POST[pais]','$_POST[codigo_postal]')";
//  		mysql_query($query2);
//  	}
// 	$query = "INSERT INTO propiedad (nombre, capacidad, numero_habitaciones, numero_banos, cochera, wifi, precio, descripcion, id_tipo_propiedad, id_ubicacion) VALUES ('$_POST[nombre]', '$_POST[capacidad]','$_POST[habitaciones]', '$_POST[banos]','$_POST[cochera]', '$_POST[wifi]','$_POST[precio]', '$_POST[descripcion]', '$_POST[]'(SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')), 1)";
// 	if (!mysql_query($query, $conexion)){
//  		die('Error: ' . mysql_error());
//  		echo "Error al crear el usuario." . "<br />";
//  	}
//  	else{
//  		mysql_close($conexion);
// 	 	$mensaje = "El registro ha sido completado con exito! Ya puede iniciar sesion con su nombre de usuario y contraseña";
// 		echo "<script>";
// 		echo "alert('$mensaje');";  
// 		echo "window.location = 'login.php';";
// 		echo "</script>";
// 	}
// }
// mysql_close($conexion)
?>
