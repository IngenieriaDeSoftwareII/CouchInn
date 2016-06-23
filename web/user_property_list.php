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
			include 'conexion.php';
		?>

		<div class="container">
	    	<h1 class="well">Listado de Propiedades</h1>
				<form name="form1" method="post" action="user_property_list_check.php">
					<div class="panel panel-default">
						<table class="table">
						    <tr>
						    	<td><strong>ID</strong></td>
								<td><strong>Nombre</strong></td>
								<td><strong>Dirección</strong></td>
								<td><strong>Precio</strong></td>
							</tr>
							<?php
							$result = mysql_query("SELECT * FROM propiedad WHERE (id_usuario = '$_SESSION[id_usuario]')");
							while ($tabla = mysql_fetch_array($result)){
								$var = $tabla["id_propiedad"];
							?>
							<tr>
								<td> <?php echo $tabla["id_propiedad"];?></td>
								<td> <?php echo $tabla["nombre"];?></td>
								<?php
								$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$tabla[id_propiedad]'");
								$propiedad = mysql_fetch_array($result2);
								$result3 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$propiedad[id_ubicacion]'");
								$propiedad_ubicacion = mysql_fetch_array($result3);
								?>
								<td> <?php echo $propiedad_ubicacion['calle'];?>, <?php echo $propiedad_ubicacion['numero'];?>, <?php echo $propiedad_ubicacion['piso'];?>, <?php echo $propiedad_ubicacion['departamento'];?> </td>
								<td> <?php echo $tabla["precio"];?></td>
								<td> <button type="submit" name="propiedad" id="propiedad" value="<?php echo htmlspecialchars($var);?>" class="btn btn-info btn-group-xs">Ver propiedad</button> </td>
								<td> <button type="submit" name="reservas" id="reservas" value="<?php echo htmlspecialchars($var);?>" class="btn btn-success btn-group-xs">Reservas</button> </td>
								<td> <button type="submit" name="preguntas" id="preguntas" value="<?php echo htmlspecialchars($var);?>" class="btn btn-warning btn-group-xs">Preguntas</button> </td>	
							</tr>
							<?php
							}
							?>
						</table>
					</div>
				</form>
			<div align="center">
				<a href="property_publish.php"><button type="button" class="btn btn-primary navbar-btn">Publicar propiedad</button></a>
			</div>	
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>