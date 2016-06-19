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
		include 'taskbar_manager.php';
		include 'conexion.php';
		?>

		<div class="container"> <?php
			$preg = mysql_query("SELECT * FROM pregunta WHERE id_propiedad = '$_POST[preguntas]'");
			$table = mysql_fetch_array($preg);
			$query = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$table[id_propiedad]'");
			$nombre = mysql_fetch_array($query);
			$nombre_prop = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$_POST[preguntas]'");
			$nom = mysql_fetch_array($nombre_prop);
			?>
	    	<h1 class="well">Listado de preguntas de la propiedad "<?php echo $nom["nombre"];?>"</h1>
				<form name="form1" method="post" action=""> <!--iria el check-->
					<div class="panel panel-default">
						<table class="table">
						    <tr>
								<td><strong>Nombre de Usuario</strong></td>
								<td><strong>Pregunta</strong></td>
							</tr>
							<?php
							$preguntas = mysql_query("SELECT * FROM pregunta WHERE id_propiedad = '$_POST[preguntas]'");
							while ($tabla = mysql_fetch_array($preguntas)){
								$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$tabla[id_propiedad]'");
								$nombre_propiedad = mysql_fetch_array($result2);
								$result3 = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$tabla[id_usuario]'");
								$nombre_usuario = mysql_fetch_array($result3);
							?>
							<tr>
								<td> <?php echo $nombre_usuario["nombre_usuario"];?></td>
								<td> <?php echo $tabla["descripcion"];?></td>
								<?php
								if (($tabla['respuesta']) != (NULL)) { ?>
 									<td> <a type="submit" class="btn btn-success btn-group-xs" name="ver_respuesta" id="ver_respuesta" href="#" onclick="return confirm('Todavia no esta funcionando !!')">Ver Respuesta</a>
									</td>
 								<?php
 								}
								else{ 
								?>
								<td> <a type="submit" class="btn btn-warning btn-group-xs" name="responder" id="responder" href="#" onclick="return confirm('Todavia no esta funcionando !!')">Responder</a>
								</td>
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
			<div align="center">
				<a href="user_property_list.php"><button type="button" class="btn btn-primary navbar-btn">Volver a Mis Propiedades</button></a>
			</div>	
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>