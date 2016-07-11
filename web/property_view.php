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
	    <link rel="stylesheet" href="css/uikit.min.css">
	    <link rel="stylesheet" href="css/components/slideshow.min.css">
		<link rel="stylesheet" href="css/components/slidenav.min.css">
  	</head>
  	<body>
    	<?php
			include 'taskbar_manager.php';
	    	include 'conexion.php';
	    	
			$result = mysql_query("SELECT * FROM propiedad WHERE id_propiedad =  '$_GET[id_propiedad]'");
			$propiedad = mysql_fetch_array($result);
			$result1 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$propiedad[id_ubicacion]'");
			$propiedad_ubicacion = mysql_fetch_array($result1);
			$result2 = mysql_query("SELECT * FROM tipo_propiedad WHERE id_tipo_propiedad = '$propiedad[id_tipo_propiedad]'");
			$tipo_propiedad = mysql_fetch_array($result2);
			$result3 = mysql_query("SELECT * FROM foto WHERE id_propiedad = '$propiedad[id_propiedad]'");
			$foto_propiedad = mysql_fetch_array($result3);
			$result4 = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$propiedad[id_usuario]'");
			$usuario_propiedad = mysql_fetch_array($result4);
	    ?>
	    <div class="container">
    		<h1 class="well"><?php echo $propiedad['nombre'];?> | <?php echo $propiedad_ubicacion['ciudad'];?> </h1>
		</div>

		<div class="container">
			<div class="col-lg-12 well">
					<div class="row">
						<div class="col-sm-9 form-group">
					       	<div data-uk-slideshow="{kenburns:false}">
						        <div class="uk-slidenav-position" data-uk-slideshow>
						            <ul class="uk-slideshow">
						            	<?php
						            	include 'conexion.php';
						            	$result = mysql_query("SELECT * FROM foto WHERE id_propiedad = '$propiedad[id_propiedad]'");
										while ($foto = mysql_fetch_array($result)){
										?>
				    						<li align='center'>
				    							<img src="<?php echo $foto['url'];?>"  alt="Imagen">
				    						</li>
						                <?php
						                }
						                ?>
						            </ul>
						            <?php
										if ($usuario_propiedad['rol'] == 2){
										?>
								            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="width:160px;height:560px;"></a>
								            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="width:160px;height:560px; "></a>
								        <?
										}
									?>
						        </div>
					    	</div>
				    	</div>
				   		<div class="col-sm-3 form-group">
				   			<div class="row">
								<label>Precio</label>
								<span readonly id="nombre" class="form-control"> $<?php echo $propiedad['precio'];?> </span>
							</div>
							<br>
							<div class="row">
								<label>Direccion</label>
								<span readonly id="nombre" class="form-control"> <?php echo $propiedad_ubicacion['calle'];?>, <?php echo $propiedad_ubicacion['numero'];?>, <?php echo $propiedad_ubicacion['piso'];?>, <?php echo $propiedad_ubicacion['departamento'];?> </span>
							</div>
							<br>
							<div class="row">
								<label>Puntuacion Propiedad</label>
								<span readonly id="nombre" class="form-control"> </span>
							</div>
							<br>
							<div class="row">
								<label>Puntuacion Propietario</label>
								<span readonly id="nombre" class="form-control"> </span>
							</div>
						</div>
					<br>

				<form name="form1" method="post" action="property_reservation.php?id_propiedad=<?php echo $propiedad['id_propiedad'];?>">
					<div class="row">
						<div class="col-sm-5 form-group">
							<label>Tipo de Propiedad</label>
							<span readonly id="nombre" class="form-control"> <?php echo $tipo_propiedad['nombre'];?> </span>
						</div>	
						<div class="col-sm-7 form-group">
							<label>Ubicacion</label>
							<span readonly id="nombre" class="form-control"> <?php echo $propiedad_ubicacion['ciudad'];?>, <?php echo $propiedad_ubicacion['provincia'];?>, <?php echo $propiedad_ubicacion['pais'];?> </span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 form-group">
							<label>Capacidad</label>
							<span readonly id="nombre" class="form-control"> <?php echo $propiedad["capacidad"];?> </span>
						</div>	
						<div class="col-sm-2 form-group">
							<label>Habitaciones</label>
							<span readonly id="nombre" class="form-control"> <?php echo $propiedad["numero_habitaciones"];?> </span>
						</div>	
						<div class="col-sm-2 form-group">
							<label>Baños</label>
							<span readonly id="nombre" class="form-control"> <?php echo $propiedad["numero_banos"];?> </span>
						</div>			
						<div class="col-sm-2 form-group">
							<label>Wifi</label>
							<span readonly id="nombre" class="form-control">
								<?php 
								if ($propiedad['wifi'] == 1){
									echo "Si";
								}
								else{
									echo "No";
								}
							?> 
							</span>
						</div>	
						<div class="col-sm-2 form-group">
							<label>Cochera</label>
							<span readonly id="nombre" class="form-control">
							<?php 
								if ($propiedad['cochera'] == 1){
									echo "Si";
								}
								else{
									echo "No";
								}
							?> 
							</span>
						</div>
					</div>						
					<div class="row">					
						<div class="col-sm-12 form-group">
							<label>Descripcion</label>
							<textarea readonly type="long-text" maxlength="800" name="descripcion" id="descripcion" rows="4" value="<?php echo $row2['descripcion'];?>" class="form-control"> <?php echo $propiedad["descripcion"];?> </textarea>
						</div>	
					</div>
					<div align="center">
						<div>
							<button type="submit" class="btn btn-default navbar-btn" name="prop" id="prop" value="<?php echo htmlspecialchars($var);?>">Alquilar</button>
						</div>
					</div>
				</form>
			</div>
		</div>	
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/uikit.min.js"></script>
		<script src="js/components/slideshow.min.js"></script>
		<script src="js/components/slideset.min.js"></script>
		<script src="js/components/slider.min.js"></script> 
	</body>
</html>