<?php
session_start();

include 'conexion.php';

$query = "UPDATE propiedad SET nombre = '$_POST[nombre]', capacidad = '$_POST[capacidad]', numero_habitaciones = '$_POST[habitaciones]', numero_banos = '$_POST[banos]', cochera = '$_POST[cochera]', wifi = '$_POST[wifi]', precio = '$_POST[precio]', descripcion = '$_POST[descripcion]', id_tipo_propiedad = '$_POST[tipo_propiedad]', id_usuario = '$_SESSION[id_usuario]' WHERE (id_propiedad = '$_POST[modificar]')";

$exist = "SELECT * FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')";
$result = mysql_query($exist);
$count = mysql_num_rows($result);
if ($count == 0){
	$query2 = "INSERT INTO ubicacion (calle, numero, piso, departamento, ciudad, provincia, pais, codigo_postal) VALUES ('$_POST[calle]', '$_POST[numero]','$_POST[piso]', '$_POST[departamento]','$_POST[ciudad]', '$_POST[provincia]','$_POST[pais]','$_POST[codigo_postal]')";
	mysql_query($query2);
}
$result = mysql_query("SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]')");

$usuario_id_ubicacion = mysql_fetch_assoc($result);

$query2 = "UPDATE propiedad SET id_ubicacion = $usuario_id_ubicacion[id_ubicacion] WHERE (id_propiedad = '$_POST[modificar]')"; 

mysql_query($query, $conexion);
mysql_query($query2, $conexion);

for ($i = 0; $i < count($_FILES['imagen']['name']); $i++) {
	if ($_FILES["imagen"]["error"][$i] == 0){
		$ruta = "uploaded_images/" . $_FILES['imagen']['name'][$i];
		$tmp = $_FILES["imagen"]["tmp_name"][$i];
		$resultado = @move_uploaded_file($tmp, $ruta);
		if ($resultado){
			if ($_SESSION['rol'] == 1){
				$eliminarFoto = "DELETE FROM foto WHERE (id_propiedad = '$_POST[modificar]')";
				$result = mysql_query($eliminarFoto);
				$query1 = "INSERT INTO foto (url, id_propiedad) VALUES ('$ruta', (SELECT id_propiedad FROM propiedad WHERE (nombre = '$_POST[nombre]') AND (capacidad = '$_POST[capacidad]') AND (numero_habitaciones = '$_POST[habitaciones]') AND (numero_banos = '$_POST[banos]') AND (cochera = '$_POST[cochera]') AND (wifi = '$_POST[wifi]') AND (precio = '$_POST[precio]') AND (descripcion = '$_POST[descripcion]') AND (id_tipo_propiedad = '$_POST[tipo_propiedad]') AND (id_ubicacion = (SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]'))) AND (id_usuario = '$_SESSION[id_usuario]')))";
				mysql_query($query1);
			}
			else{
				$exist = "SELECT * FROM foto WHERE (id_propiedad = '$_POST[modificar]')";
				$result = mysql_query($exist);
				$count = mysql_num_rows($result);
				if ($count < 5){
					$query1 = "INSERT INTO foto (url, id_propiedad) VALUES ('$ruta', (SELECT id_propiedad FROM propiedad WHERE (nombre = '$_POST[nombre]') AND (capacidad = '$_POST[capacidad]') AND (numero_habitaciones = '$_POST[habitaciones]') AND (numero_banos = '$_POST[banos]') AND (cochera = '$_POST[cochera]') AND (wifi = '$_POST[wifi]') AND (precio = '$_POST[precio]') AND (descripcion = '$_POST[descripcion]') AND (id_tipo_propiedad = '$_POST[tipo_propiedad]') AND (id_ubicacion = (SELECT id_ubicacion FROM ubicacion WHERE (calle = '$_POST[calle]') AND (numero = '$_POST[numero]') AND (piso = '$_POST[piso]') AND (departamento = '$_POST[departamento]') AND (pais = '$_POST[pais]') AND (provincia = '$_POST[provincia]') AND (ciudad = '$_POST[ciudad]') AND (codigo_postal = '$_POST[codigo_postal]'))) AND (id_usuario = '$_SESSION[id_usuario]')))";
					mysql_query($query1);
				}
				else{
					mysql_close($conexion);
					$mensaje = "La informacion de la propiedad ha sido modificada con exito, aunque no se han podido subir todas las imagenes ya que alcanzo su limite de imagenes por propiedad.";
					echo "<script>";
					echo "alert('$mensaje');";  
					echo "window.location = 'user_property_list.php';";
					echo "</script>";
				}
			}
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
$mensaje = "La informacion de la propiedad ha sido modificada con exito.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'user_property_list.php';";
echo "</script>";

?>