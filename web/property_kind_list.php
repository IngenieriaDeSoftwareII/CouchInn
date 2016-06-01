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
			if ($_SESSION['rol'] == 1){
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
		$con = mysql_connect('localhost', 'root', '') or die ("No se pudo conectar a la BD");
		mysql_select_db("couchInn", $con) or die ("No se pudo conectar a la BD");
		?>

		<div class="container">
			<form name="form1" method="post" action="property_kind_delete_or_modify_check.php">
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">Tipos de Propiedades</div>

					<!-- Table -->
					<table class="table">
					    <tr>
					    	<td><strong>ID</strong></td>
							<td><strong>Nombre</strong></td>
							<td><strong>Descripcion</strong></td>
						</tr>
						<?php
						$result = mysql_query("SELECT * FROM tipo_propiedad");
						while ($tabla = mysql_fetch_array($result)){ ?>
							<?php
								$var = $tabla["id_tipo_propiedad"];
							?>
							<tr>
								<td> <?php echo $tabla["id_tipo_propiedad"];?></td>
								<td> <?php echo $tabla["nombre"];?></td>
								<td> <?php echo $tabla["descripcion"];?></td>
								<td> <button type="submit" name="modificar" id="modificar" value="<?php echo htmlspecialchars($var);?>" class="btn btn-warning btn-group-xs">Modificar</button> </td>
								<td> <button type="submit" name="eliminar" id="eliminar" value="<?php echo htmlspecialchars($var);?>" class="btn btn-danger btn-group-xs">Eliminar</button> </td>
							</tr>
						<?php
						}
						?>
					</table>
				</div>
			</form> 
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>