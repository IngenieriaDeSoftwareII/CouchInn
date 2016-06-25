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
	    <link rel="stylesheet" href="css/w3.css">
  	</head>
  	<body>
    	<?php
			if (isset ($_SESSION['rol'])){
				if (($_SESSION['rol'] == 1) || ($_SESSION['rol'] == 2)){
					include 'user_taskbar.php';
				}
				else{
					header("Location: index.php");
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
					<div class="panel panel-default">
						<table class="table">
						    <tr>
						    	<td align="center"><strong>ID</strong></td>
								<td align="center"><strong>Nombre Propiedad</strong></td>
								<td align="center"><strong>Fecha Inicio</strong></td>
								<td align="center"><strong>Fecha Fin</strong></td>
								<td align="center"><strong>Estado</strong></td>
							</tr>
							<?php
							include 'conexion.php';
							$result = mysql_query("SELECT * FROM reserva_propiedad WHERE id_huesped = $_SESSION[id_usuario]");
							while ($tabla = mysql_fetch_array($result)){
								$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = $tabla[id_propiedad]");
								$propiedad = mysql_fetch_array($result2);
							?>
							<tr>
								<td align="center"> <?php echo $tabla["id_reserva_propiedad"];?></td>
								<td align="center"> <?php echo $propiedad["nombre"];?></td>
								<td align="center"> <?php echo $tabla["fecha_inicio_reserva"];?></td>
								<td align="center"> <?php echo $tabla["fecha_fin_reserva"];?></td>
								<?php 
									if ($tabla["estado"] == 0){
									?>
									<td align="center"> Esperando confirmacion </td>
									<?php
									}
									elseif ($tabla["estado"] == 1){
									?>
									<td align="center"> Aceptada </td>
									<?php
									}
									elseif ($tabla["estado"] == 2){
									?>
									<td align="center"> Finalizada </td>
									<?php
									}
									else{
									?>
									<td align="center"> Cancelada </td>
									<?php
									}
								?>
								<td><a href="property_view.php?id_propiedad=<?php echo $propiedad["id_propiedad"];?>" align="center"><button name="ver_propiedad" class="btn btn-primary btn-group-xs">Ver Propiedad</button></a></td>

								<?php
								if ($tabla["estado"] < 2){
								?>									
									<td><a href="reservation_cancel_check.php?id_reserva_propiedad=<?php echo htmlspecialchars($tabla["id_reserva_propiedad"]);?>" align="center"><button name="cancelar" id="cancelar" onclick="return confirm('Esta seguro que desea cancelar su reserva de forma permanente?')" class="btn btn-danger btn-group-xs">Cancelar</button></a></td>
								<?php
								}
								else{
								?>
									<td align="center"> <button type="submit" style="display: none;"></button></td>
								<?php
								}
								?>
							</tr>
							<?php
							}
							?>
						</table>
					</div>
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>