<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = ""; 

$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");

?>