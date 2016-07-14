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
	     <script>
	    	function justNumbers(e){
		        var keynum = window.event ? window.event.keyCode : e.which;
		        if ((keynum == 8) || (keynum == 46))
		        return true;
		         
		        return /\d/.test(String.fromCharCode(keynum));
	        }  
	    </script>     
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
								<td align="center"><strong>Nombre Propiedad</strong></td>
								<td align="center"><strong>Fecha Inicio</strong></td>
								<td align="center"><strong>Fecha Fin</strong></td>
								<td align="center"><strong>Estado</strong></td>
								<td align="center"><strong></strong></td>
								<td align="center"><strong></strong></td>
								<td align="center"><strong>Puntuacion</strong></td>
							</tr>
							<?php
							include 'conexion.php';
							$result = mysql_query("SELECT * FROM reserva_propiedad WHERE id_huesped = $_SESSION[id_usuario]");
							while ($tabla = mysql_fetch_array($result)){
								$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = $tabla[id_propiedad]");
								$propiedad = mysql_fetch_array($result2);
								$result3 = mysql_query("SELECT * FROM usuario WHERE id_usuario = $propiedad[id_usuario]");
								$usuario = mysql_fetch_array($result3);
								$id_reserva = $tabla["id_reserva_propiedad"];
								$query = mysql_query("SELECT * FROM puntaje_propiedad WHERE id_reserva = $id_reserva");
								$mi_puntaje = mysql_fetch_array($query);
								$query2 = mysql_query("SELECT * FROM puntaje_propietario WHERE id_reserva = $id_reserva");
								$mi_puntaje2 = mysql_fetch_array($query2);
								$count = mysql_num_rows($query);	
							?>
							<tr>
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
								<td><a href="property_view.php?id_propiedad=<?php echo $propiedad["id_propiedad"];?>" align="center"><button name="ver_propiedad" class="btn btn-info btn-group-xs">Ver Propiedad</button></a></td>

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
								if ($tabla["estado"] == 2){
									if ($count == 0){
								?>
									<div class="modal fade" id="myModal<?php echo htmlspecialchars($id_reserva);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
											    	<div class="modal-content">
											      		<form name="puntuacion" action="reservation_punctuation.php" method="POST">
												      		<div class="modal-header">
												        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          			<span aria-hidden="true">&times;</span>
												        		</button>
												        		<h4 align="center" class="modal-title" style="font-size:200%;" id="myModalLabel">Puntuar Reserva</h4>
												      		</div>
												      		<div class="modal-body">
												        		<div align="center"><span class="glyphicon glyphicon-user" style="font-size:200%;"></span><span style="font-size:120%;"> <?php echo $usuario["nombre_usuario"];?></span></div>
												        		<br>
												        		<div align="center"><input name="puntajepropietario" onkeypress="return justNumbers(event);" type="number" min=1 max=5 placeholder="Puntaje Propietario" class="form-control" style="width: 100px; text-align: center;" required="required"></div>
												        		<br>
												        		<div align="center"><span class="glyphicon glyphicon-home" style="font-size:200%;"></span><span style="font-size:120%;"> <?php echo $propiedad["nombre"];?></span></div>
												        		<br>
												        		<div align="center"><input name="puntajepropiedad" onkeypress="return justNumbers(event);" type="number" min=1 max=5 placeholder="Puntaje Propiedad" class="form-control" style="width: 100px; text-align: center;" required="required"></div>
												      		</div>
												      		<div class="modal-footer">
												        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
												        		<button type="submit" class="btn btn-primary" name="id_reserva" value="<?php echo htmlspecialchars($tabla["id_reserva_propiedad"]);?>">Puntuar</button>
												      		</div>
												      	</form>
											    	</div>
											 	</div>
											</div>
										<td align="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo htmlspecialchars($id_reserva);?>">Puntuar Reserva</button>
										<td align="center"> <button type="submit" style="display: none;"></button></td>
								<?php
									}
									else{
								?>
									<td align="center"> Puntuacion propiedad: <?php echo $mi_puntaje['puntaje']; ?> <br> Puntuacion propietario: <?php echo $mi_puntaje2['puntaje']; ?></td>
								<?php
									}
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