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

		<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Tipos de Propiedades</div>

			  <!-- Table -->
			  <table class="table">
			    <tr>
					<td><strong>Nombre</strong></td>
					<td><strong>Descripcion</strong></td>
					<td><strong>Modificar</strong></td>
					<td><strong>Eliminar</strong></td>
				</tr>
				<?php
				$result = mysql_query("SELECT * FROM tipo_propiedad");
				while ($tabla = mysql_fetch_array($result)){ ?>
					<tr>
						<td> <?php echo $tabla["nombre"];?></td>
						<td> <?php echo $tabla["descripcion"];?></td>
						<button type="button" class="btn btn-danger navbar-btn" onClick="window.location.href='session_close.php'">Modificar</button>
						<button type="button" class="btn btn-danger navbar-btn" onClick="window.location.href='property_kind_delete_check.php'">Eliminar</button>
					</tr>
				<?php
				}
				?>
			  </table>
			</div>
	</body>
</html>