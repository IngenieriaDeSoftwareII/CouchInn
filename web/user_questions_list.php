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
			include "conexion.php";
		?>
		<div class="container"> 
	    	<h1 class="well">Listado de Mis Preguntas</h1>
				<form name="form1" method="post" action="property_questions_list_check.php">
					<div class="panel panel-default">
						<table class="table">
						    <tr>
								<td align="center"><strong>ID Pregunta</strong></td>
								<td align="center"><strong>Pregunta</strong></td>
								<td align="center"><strong>Nombre Propiedad</strong></td>
								<td align="center"><strong>Nombre de Usuario</strong></td>
								<td align="center"><strong>Respondida</strong></td>
							</tr>
							<?php
							$id_usuario = $_SESSION['id_usuario'];
							$preguntas = mysql_query("SELECT * FROM pregunta WHERE id_usuario = $id_usuario");
							while ($tabla = mysql_fetch_array($preguntas)){
								$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$tabla[id_propiedad]'");
								$nombre_propiedad = mysql_fetch_array($result2);
								$result3 = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$nombre_propiedad[id_usuario]'");
								$nombre_usuario = mysql_fetch_array($result3);
								$var2 = $tabla["id_pregunta"];
							?>
							<tr>
								<td align="center"> <?php echo $tabla["id_pregunta"];?></td>
								<td align="center"> <?php echo $tabla["descripcion"];?></td>
								<td align="center"> <?php echo $nombre_propiedad["nombre"];?></td>
								<td align="center"> <?php echo $nombre_usuario["nombre_usuario"];?></td>
								<?php
								if (($tabla['respuesta']) != (NULL)) { ?>
 									<td align="center"> <button type="submit" class="btn btn-success btn-group-xs" name="ver_respuesta" id="ver_respuesta" value="<?php echo htmlspecialchars($var2);?>" class="btn btn-danger btn-group-xs">Ver Respuesta</button>
									</td>
 								<?php
 								}
								else{ echo '<td><b><center>No</b></td>';
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
				<a href="user_property_list.php"><button type="button" class="btn btn-primary navbar-btn">Ir a Mis Propiedades</button></a>
			</div>	
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>