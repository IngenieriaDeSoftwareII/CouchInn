<?php
/* start the session */
session_start();
?>

<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
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
	header("Location: index.php");
}
else {
echo "Username o Password estan incorrectos.";
echo "<a href='login.php'>Volver a Intentarlo</a>";
}
?>