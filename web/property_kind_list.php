<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Couch Inn - Reserva tu proximo Hospedaje!</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  	</head>
  	<body>
    	<?php
		if (isset ($_SESSION['rol'])){
			if ($_SESSION['rol'] == 0){
				header("Location: index.php");
			}
			else{
				include 'admin_taskbar.php';
			}
		}
		else{
			header("Location: index.php");
		}
		?>
	</body>
</html>

<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = ""; 

$conexion = mysql_connect($host_db, $user_db, $pass_db);
mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");

$result = mysql_query("SELECT * FROM tipo_propiedad");

echo "<table border='1'>
<tr>
<th>Nombre</th>
<th>Descripcion</th>
</tr>";

while ($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['nombre'] . "</td>";
echo "<td>" . $row['descripcion'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysql_close($conexion);
?>