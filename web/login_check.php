<?php
/* start the session */
session_start();
?>

<?php
include 'conexion.php';
// data enviada desde el formulario
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM usuario WHERE (nombre_usuario = '$_POST[username]') and (contrasena = '$_POST[password]')";
$result = mysql_query($sql);  
// counting table row
$count = mysql_num_rows($result);
// If result matched $username and $password
if($count == 1){
	$_SESSION['username'] = $username;
	$rol_query = "SELECT rol FROM usuario WHERE (nombre_usuario = '$_POST[username]')";
	$rol = mysql_query($rol_query);
	$row = mysql_fetch_assoc($rol);
	$_SESSION['rol'] = $row['rol'];
	$id_query = "SELECT id_usuario FROM usuario WHERE (nombre_usuario = '$_POST[username]')";
	$id_usuario = mysql_query($id_query);
	$row2 = mysql_fetch_assoc($id_usuario);
	$_SESSION['id_usuario'] = $row2['id_usuario'];
	
	if ($_SESSION['rol'] == 0){
		$_SESSION['user'] = true;
	}
	else {
		$_SESSION['admin'] = true;	
	}
	mysql_close($conexion);
	header("Location: index.php");
}
else {
	mysql_close($conexion);
	$mensaje = "Nombre de usuario o contraseña incorrectos.";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'login.php';";
echo "</script>";
}
?>