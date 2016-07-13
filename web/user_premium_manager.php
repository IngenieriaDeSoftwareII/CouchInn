<?php
session_start();

function premium_unmaker($id_usuario){
	include 'conexion.php';
	$hacerRegular = "UPDATE usuario SET rol = 1 WHERE (id_usuario = $id_usuario)";
	mysql_query($hacerRegular);
	mysql_close($conexion);
	header("Location: admin_users_list.php");
}

function premium_maker($id_usuario){
	include 'conexion.php';
	$hacerPremium = "UPDATE usuario SET rol = 2 WHERE (id_usuario = $id_usuario)";
	mysql_query($hacerPremium);
	mysql_close($conexion);
	header("Location: admin_users_list.php");
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
	header("Location: admin_users_list.php");	
}

?>