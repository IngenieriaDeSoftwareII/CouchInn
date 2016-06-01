<?php
session_start();

function premium_unmaker($id_usuario){
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";

	$conexion = mysql_connect($host_db, $user_db, $pass_db);
	mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
	$hacerRegular = "UPDATE usuario SET rol = 1 WHERE (id_usuario = $id_usuario)";
	mysql_query($hacerRegular);
	mysql_close($conexion);
	header("Location: users_list.php");
}

function premium_maker($id_usuario){
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";

	$conexion = mysql_connect($host_db, $user_db, $pass_db);
	mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
	$hacerPremium = "UPDATE usuario SET rol = 2 WHERE (id_usuario = $id_usuario)";
	mysql_query($hacerPremium);
	mysql_close($conexion);
	header("Location: users_list.php");
}

if (isset($_POST['premium'])) {
   	$id_usuario = $_POST['premium'];
    premium_maker($id_usuario);
}
elseif (isset($_POST['regular'])) {
   	$id_usuario = $_POST['regular'];
   	premium_unmaker($id_usuario);
}
else{
	header("Location: users_list.php");	
}

?>