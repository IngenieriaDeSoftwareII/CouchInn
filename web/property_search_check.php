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
			include 'taskbar_manager.php';
			include 'conexion.php';

			$cont = 0;
			if($_POST['tipo_propiedad'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['ciudad'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['provincia'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['pais'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['precio'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['capacidad'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['habitaciones'] != ''){
				$cont = $cont + 1;
			}
			if($_POST['banos'] != ''){
				$cont = $cont + 1;
			}
			// if(isset($_POST['wifi'])){
			// 	$cont = $cont + 1;
			// }
			// if(isset($_POST['cochera'])){
			// 	$cont = $cont + 1;
			// }

			if ($cont != 0){
				$contador = 0;
				$resultado = "SELECT * FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE ";
				if($_POST['tipo_propiedad'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND propiedad.id_tipo_propiedad IN (SELECT id_tipo_propiedad FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE id_tipo_propiedad = '$_POST[tipo_propiedad]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "id_tipo_propiedad = '$_POST[tipo_propiedad]'";
					}	
					
				}
				if($_POST['ciudad'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND ubicacion.ciudad IN (SELECT ciudad FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE ciudad = '$_POST[ciudad]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "ciudad = '$_POST[ciudad]'";
					}	
				}
				if($_POST['provincia'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND ubicacion.provincia IN (SELECT provincia FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE provincia = '$_POST[provincia]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "provincia = '$_POST[provincia]'";
					}	
				}
				if($_POST['pais'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND ubicacion.pais IN (SELECT pais FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE pais = '$_POST[pais]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "pais = '$_POST[pais]'";
					}	
				}
				if($_POST['precio'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND propiedad.precio IN (SELECT precio FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE precio = '$_POST[precio]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "precio = '$_POST[precio]'";
					}	
				}
				if($_POST['capacidad'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND propiedad.capacidad IN (SELECT capacidad FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE capacidad = '$_POST[capacidad]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "capacidad = '$_POST[capacidad]'";
					}	
				}
				if($_POST['habitaciones'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND propiedad.numero_habitaciones IN (SELECT numero_habitaciones FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE numero_habitaciones = '$_POST[habitaciones]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "numero_habitaciones = '$_POST[habitaciones]'";
					}	
				}
				if($_POST['banos'] != ''){
					if ($contador == 1){
						$resultado = $resultado . " AND propiedad.numero_banos IN (SELECT numero_banos FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE numero_banos = '$_POST[banos]'";
					}
					else{
						$contador = 1;
						$resultado = $resultado . "numero_banos = '$_POST[banos]'";
					}	
				}
				// if($_POST['wifi'] == 1){
				// 	if ($contador == 1){
				// 		$resultado = $resultado . " AND propiedad.wifi IN (SELECT wifi FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE wifi = '$_POST[wifi]'";
				// 	}
				// 	else{
				// 		$contador = 1;
				// 		$resultado = $resultado . "wifi = $_POST[wifi]";
				// 	}	
				// }
				// if($_POST['cochera'] == 1){
				// 	if ($contador == 1){
				// 		$resultado = $resultado . " AND propiedad.cochera IN (SELECT cochera FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion) WHERE cochera = '$_POST[cochera]'";
				// 	}
				// 	else{
				// 		$contador = 1;
				// 		$resultado = $resultado . "cochera = $_POST[cochera]";
				// 	}	
				// }
			
				while ($cont != 1){
					$resultado = $resultado . ")";
					$cont = $cont -1;
				}
			}
			else{
				$resultado = "SELECT * FROM propiedad INNER JOIN ubicacion ON (propiedad.id_ubicacion = ubicacion.id_ubicacion)";
			}
			$result = mysql_query($resultado);
		?>
 		<div class="container">
	    	<h1 class="well">Listado de Propiedades</h1>
					<div class="panel panel-default">
						<table class="table">
						    <tr>
						    	<td></td>
								<td align="center"><strong>Nombre</strong></td>
								<td align="center"><strong>Dirección</strong></td>
								<td align="center"><strong>Precio</strong></td>
							</tr>

							<tr>
								<?php
								while ($tabla = mysql_fetch_array($result)){
									$var = $tabla["id_propiedad"];
									$query_foto = mysql_query("SELECT * FROM foto WHERE id_propiedad = '$tabla[id_propiedad]'");
									$foto = mysql_fetch_array($query_foto);
								?>
									<td align="center"><a href="property_view.php?id_propiedad=<?php echo htmlspecialchars($tabla["id_propiedad"]);?>"><img src="<?php echo $foto['url'];?>" alt="Imagen" height="100" width="180" ></a></td>
									<td align="center" style="vertical-align:middle;"> <?php echo $tabla["nombre"];?></td>
									<?php
									$result2 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$tabla[id_propiedad]'");
									$propiedad = mysql_fetch_array($result2);
									$result3 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$propiedad[id_ubicacion]'");
									$propiedad_ubicacion = mysql_fetch_array($result3);
									?>
									<td align="center" style="vertical-align:middle;"> <?php echo $propiedad_ubicacion['calle'];?>, <?php echo $propiedad_ubicacion['numero'];?>, <?php echo $propiedad_ubicacion['piso'];?>, <?php echo $propiedad_ubicacion['departamento'];?> </td>
									<td align="center" style="vertical-align:middle;"> <?php echo $tabla["precio"];?></td>
									<td align="center" style="vertical-align:middle;"><a href="property_view.php?id_propiedad=<?php echo htmlspecialchars($tabla["id_propiedad"]);?>"><button class="btn btn-info btn-group-xs">Ver propiedad</button></a></td>
							</tr>
							<?php
							}
							?>
						</table>
					</div>
			<div align="center">
				<button class="btn btn-primary navbar-btn" onClick="window.location.href='javascript:history.back(-1);'">Volver</button>
			</div>	
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>