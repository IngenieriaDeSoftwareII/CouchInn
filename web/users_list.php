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
		
		// Conectando, seleccionando la base de datos
		$con = mysql_connect('localhost', 'root', '')
		or die ("No se pudo conectar a la BD");
		mysql_select_db("couchInn", $con)
		 or die ("No se pudo conectar a la BD");
		?>
		<div class="container">
			<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Listado de Usuarios</div>

				  <!-- Table -->
				  <table class="table">
				    <tr>
				    	<td><strong>Nombre_Usuario</strong></td>
						<td><strong>Contrasena</strong></td>
						<td><strong>Nombre</strong></td>
						<td><strong>Apellido</strong></td>
						<td><strong>DNI</strong></td>
						<td><strong>Telefono</strong></td>
						<td><strong>Email</strong></td>
					</tr>
					<?php
					$result = mysql_query("SELECT * FROM usuario");
					while ($tabla = mysql_fetch_array($result)){ ?>
						<tr>
							<td> <?php echo $tabla["nombre_usuario"];?></td>
							<td> <?php echo $tabla["contrasena"];?></td>
							<td> <?php echo $tabla["nombre"];?></td>
							<td> <?php echo $tabla["apellido"];?></td>
							<td> <?php echo $tabla["dni"];?></td>
							<td> <?php echo $tabla["telefono"];?></td>
							<td> <?php echo $tabla["email"];?></td>
						</tr>
					<?php
					}
					?>
				  </table>
			</div>
		</div>
	</body>
</html>