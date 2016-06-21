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
			if (($_SESSION['rol'] == 1) || ($_SESSION['rol'] == 2)){
				include 'user_taskbar.php';
			}
			else{
				include 'admin_taskbar.php';
			}
		}
		else{
			header("Location: index.php");
		}
		
		// Conectando, seleccionando la base de datos
		include 'conexion.php';
		?>

		<div class="container">
	    	<h1 class="well">Mis Reservas</h1>
				<form name="form1" method="post" action="reservation_cancel_check.php">
					<div class="panel panel-default">
						<table class="table">
						    <tr>
						    	<td><strong>ID</strong></td>
								<td><strong>Nombre Propiedad</strong></td>
								<td><strong>Fecha Inicio</strong></td>
								<td><strong>Fecha Fin</strong></td>
								<td><strong>Estado</strong></td>
								<td><strong>Cancelacion</strong></td>
							</tr>
							<?php
							include 'conexion.php';
							$result = mysql_query("SELECT * FROM reserva_propiedad WHERE id_huesped = $_SESSION[id_usuario]");
							while ($tabla = mysql_fetch_array($result)){
								$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = $tabla[id_propiedad]");
								$propiedad = mysql_fetch_array($result2);

							?>
							<tr>
								<td> <?php echo $tabla["id_reserva_propiedad"];?></td>
								<td> <?php echo $propiedad["nombre"];?></td>
								<td> <?php echo $tabla["fecha_inicio_reserva"];?></td>
								<td> <?php echo $tabla["fecha_fin_reserva"];?></td>
								<td> <?php echo $tabla["estado"];?></td>
								<?php
								if ($tabla["estado"] == 1){ ?>									
										<td> <button type="submit" name="cancelar" id="cancelar" onclick="return confirm('Esta seguro que desea cancelar su reserva de forma permanente?')" value="<?php echo htmlspecialchars($tabla["id_reserva_propiedad"]);?>" class="btn btn-danger btn-group-xs">Cancelar</button> </td>
								<?php
								}
								?>
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