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
	    <script language="Javascript"> 
		    function validation(){
				var puntaje = document.getElementById("puntaje").value;
				if (puntaje == ''){
					alert("Por favor ingrese el puntaje del huesped.");
					return false;
				}
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
	    	<h1 class="well">Administrar Reservas</h1>
<!-- 				<form name="form1" method="post" action="reservation_administration_check.php">
 -->					<div class="panel panel-default">
						<table class="table">
						    <tr>
								<td align="center"><strong>Nombre del Huesped</strong></td>
								<td align="center"><strong>Puntuación</strong></td>
								<td align="center"><strong>Fecha Inicio</strong></td>
								<td align="center"><strong>Fecha Fin</strong></td>
								<td align="center"><strong>Estado</strong></td>
							</tr>
							<?php
							include 'conexion.php';
							$result = mysql_query("SELECT * FROM reserva_propiedad WHERE id_propiedad = $_POST[reservas]");
							while ($tabla = mysql_fetch_array($result)){
								$query2 = mysql_query("SELECT AVG(puntaje) AS promedio FROM puntaje_huesped WHERE id_huesped = $tabla[id_huesped]");
								$puntaje = mysql_fetch_array($query2);	
								$result2 = mysql_query("SELECT * FROM usuario WHERE id_usuario = $tabla[id_huesped]");
								$usuario = mysql_fetch_array($result2);
								$id_reserva = $tabla["id_reserva_propiedad"];
								$query = mysql_query("SELECT * FROM puntaje_huesped WHERE id_reserva = $id_reserva");
								$mi_puntaje = mysql_fetch_array($query);
								$count = mysql_num_rows($query);							
							?>
							<tr>
								<td align="center"> <?php echo $usuario["nombre_usuario"];?></td>
								<td align="center"> <?php echo $puntaje['promedio']; ?> </td>
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
									<td align="center"> Rechazada </td>
									<?php
									}

									if ($tabla["estado"] == 0){
									?>									
										<td align="center" style="vertical-align:middle;"> <button type="submit" name="aceptar" id="aceptar" onclick="return confirm('Esta seguro que desea aceptar esta reserva?')" value="<?php echo htmlspecialchars($tabla["id_reserva_propiedad"]);?>" class="btn btn-success btn-group-xs">Aceptar</button> </td>
										<td align="center" style="vertical-align:middle;"> <button type="submit" name="rechazar" id="rechazar" onclick="return confirm('Esta seguro que desea rechazar esta reserva?')" value="<?php echo htmlspecialchars($tabla["id_reserva_propiedad"]);?>" class="btn btn-danger btn-group-xs">Rechazar</button> </td>
									<?php
									}
									elseif ($tabla["estado"] == 2){
										if ($count == 0){
									?>
											<div class="modal fade" id="myModal<?php echo htmlspecialchars($id_reserva);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
											    	<div class="modal-content">
											      		<form name="puntuacion" action="puntuation.php" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
												      		<div class="modal-header">
												        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          			<span aria-hidden="true">&times;</span>
												        		</button>
												        		<h4 align="center" class="modal-title" style="font-size:200%;" id="myModalLabel">Puntuar Usuario</h4>
												      		</div>
												      		<div class="modal-body">
												        		<div align="center"><span class="glyphicon glyphicon-user" style="font-size:200%;"></span><span style="font-size:120%;"> <?php echo $usuario["nombre_usuario"];?></span></div>
												        		<br>
												        		<div align="center"><input name="puntaje" id="puntaje" onkeypress="return justNumbers(event);" type="number" min=0 max=5 placeholder="Puntaje" class="form-control" style="width: 100px; text-align: center;" required="required"></div>
												      		</div>
												      		<div class="modal-footer">
												        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
												        		<button type="submit" class="btn btn-primary" name="id_reserva" value="<?php echo htmlspecialchars($id_reserva);?>">Puntuar</button>
												      		</div>
												      	</form>
											    	</div>
											 	</div>
											</div>
										<td align="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo htmlspecialchars($id_reserva);?>">Puntuar Usuario</button>
									<?php
										}
										else{
									?>
											<td align="center"> Tu puntuacion: <?php echo $mi_puntaje['puntaje']; ?> </td>
									<?php
										}
									}
									else{
									?>									
										<td align="center"> <button type="submit" style="display: none;"></button></td>
									<?php
									}
									if ($tabla["estado"] == 1){	
									?>
										<td align="center"> <button type="submit" style="display: none;"></button></td>
									<?php
									}	
									if ($tabla["estado"] > 1){
									?>
										<td align="center" style="vertical-align:middle;"><button type="submit" name="rechazar" id="rechazar" onclick="return confirm('Esta seguro que desea eliminar esta reserva del listado?')" value="<?php echo htmlspecialchars($tabla["id_reserva_propiedad"]);?>" class="btn btn-danger btn-group-xs">Eliminar</button> </td>
									<?php
									}
									?>
								</tr>
								<?php
								}
								?>
						</table>
					</div>
<!-- 				</form>
 -->			<div align="center">
				<a href="user_property_list.php"><button type="button" class="btn btn-primary navbar-btn">Volver a Mis Propiedades</button></a>
			</div>	
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>