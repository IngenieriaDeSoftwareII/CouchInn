<?php
session_start();

include 'conexion.php';

for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {
	$ruta = "uploaded_images/" . $_FILES['imagen']['name'][$i];
	if (file_exists($ruta)){
		mysql_close($conexion);
		$mensaje = "Ha ocurrido un error con la imagen/es seleccionada/s. Ya existe un archivo con ese nombre.";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location = 'property_publish.php';";
		echo "</script>";
	}
}

$exist = "SELECT * FROM propiedad WHERE (nombre = '$_POST[nombre]') AND (capacidad = '$_POST[capacidad]') AND (numero_habitaciones = '$_POST[habitaciones]') AND (numero_banos = '$_POST[banos]') AND (cochera = '$_POST[cochera]') AND (wifi = '$_POST[wifi]') AND (precio = '$_POST[precio]') AND (descripcion = '$_POST[descripcion]') AND (id_tipo_propiedad = '$_POST[tipo_propiedad]') AND (id_usuario = '$_SESSION[id_usuario]')";
$result = mysql_query($exist);
$count = mysql_num_rows($result);
if ($count == 1){
	mysql_close($conexion);
	$mensaje = "Usted ya ha publicado esta propiedad.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'property_publish.php';";
	echo "</script>";
}

$exist2 = "SELECT * FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')";
$result2 = mysql_query($exist2);
$count2 = mysql_num_rows($result2);
if ($count2 == 0){
	$query2 = "INSERT INTO ubicacion (calle, numero, piso, departamento, ciudad, provincia, pais, codigo_postal) VALUES ('$_POST[calle]', '$_POST[numero]','$_POST[piso]', '$_POST[departamento]','$_POST[ciudad]', '$_POST[provincia]','$_POST[pais]','$_POST[codigo_postal]')";
	mysql_query($query2);
}

$query = "INSERT INTO propiedad (nombre, capacidad, numero_habitaciones, numero_banos, cochera, wifi, precio, descripcion, id_tipo_propiedad, id_ubicacion, id_usuario) VALUES ('$_POST[nombre]', '$_POST[capacidad]','$_POST[habitaciones]', '$_POST[banos]','$_POST[cochera]', '$_POST[wifi]','$_POST[precio]', '$_POST[descripcion]', '$_POST[tipo_propiedad]', (SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')), '$_SESSION[id_usuario]')";
mysql_query($query);

for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {
	if ($_FILES["imagen"]["error"][$i] > 0){
		mysql_close($conexion);
		$mensaje = "Ha ocurrido un error con la imagen/es seleccionada/s!";
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location = 'property_publish.php';";
		echo "</script>";
	} 
	else {
		$ruta = "uploaded_images/" . $_FILES['imagen']['name'][$i];
		$tmp = $_FILES["imagen"]["tmp_name"][$i];
		$resultado = @move_uploaded_file($tmp, $ruta);
		if ($resultado){
			$query1 = "INSERT INTO foto (url, id_propiedad) VALUES ('$ruta', (SELECT id_propiedad FROM propiedad WHERE (nombre = '$_POST[nombre]') AND (capacidad = '$_POST[capacidad]') AND (numero_habitaciones = '$_POST[habitaciones]') AND (numero_banos = '$_POST[banos]') AND (cochera = '$_POST[cochera]') AND (wifi = '$_POST[wifi]') AND (precio = '$_POST[precio]') AND (descripcion = '$_POST[descripcion]') AND (id_tipo_propiedad = '$_POST[tipo_propiedad]') AND (id_ubicacion = (SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]'))) AND (id_usuario = '$_SESSION[id_usuario]')))";
			mysql_query($query1);
		} 
		else {
			mysql_close($conexion);
			$mensaje = "Ha ocurrido un error con la imagen/es seleccionada/s. Compruebe que la carpeta de donde selecciono la imagen tiene los permisos adecuados.";
			echo "<script>";
			echo "alert('$mensaje');";  
			echo "window.location = 'property_publish.php';";
			echo "</script>";
		}
	}
}

mysql_close($conexion);
$mensaje = "La propiedad ha sido publicada con exito!";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'user_property_list.php';";
echo "</script>";
?>