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

	    <script language="Javascript"> 
		// function confirmar(){ 
		// 	confirmar=confirm("¿Estas seguro que deseas eliminar tu cuenta de forma permanente?"); 
		// 	if (confirmar){
		// 		return true;
		// 	}
		// 	else{ 
		// 		return false; 
		// 	}
		// } 
		// </script>
  	</head>
  	<body>
    	<?php
			include 'taskbar_manager.php';
	    	$host_db = "localhost";
			$user_db = "root";
			$pass_db = ""; 

			$conexion = mysql_connect($host_db, $user_db, $pass_db);
			mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
			
			// $result = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$_POST[id_propiedad]'");
			// $propiedad = mysql_fetch_array($result);

			// $result2 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$propiedad[id_ubicacion]'");
			// $propiedad_ubicacion = mysql_fetch_array($result2);

			// $result3 = mysql_query("SELECT * FROM foto WHERE id_propiedad = '$propiedad[id_propiedad]'");
			// $foto_propiedad = mysql_fetch_array($result3);

			$result = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = 4");
			$propiedad = mysql_fetch_array($result);

			$result2 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = 503");
			$propiedad_ubicacion = mysql_fetch_array($result2);

			$result3 = mysql_query("SELECT * FROM foto WHERE id_propiedad = 4");
			$foto_propiedad = mysql_fetch_array($result3);

			$result4 = mysql_query("SELECT * FROM tipo_propiedad WHERE id_tipo_propiedad = 4");
			$tipo_propiedad = mysql_fetch_array($result4);


	    ?>
	    <div class="container">
    	<h1 class="well"><?php echo $propiedad['nombre'];?> | <?php echo $propiedad_ubicacion['ciudad'];?> </h1>
		<div class="col-lg-12 well">
			<div class="row">
				<form name="form1" method="post" action="user_data_modify.php" onsubmit="return confirmar()">
					<div class="col-sm-12">
						<div class="row">
							<img src="<?php echo $foto_propiedad['url'];?>" alt="House View" style="width:1130px;height:720px;">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
					
	<div class="container">
		<div class="col-lg-12 well">
			<div class="row">
				<div class="col-sm-8 form-group">
					<label>Ubicacion</label>
					<p readonly id="nombre" class="form-control"> <?php echo $propiedad_ubicacion['ciudad'];?>, <?php echo $propiedad_ubicacion['provincia'];?>, <?php echo $propiedad_ubicacion['pais'];?> </p>
				</div>
				<div class="col-sm-3 form-group">
					<label>Precio</label>
					<p readonly id="nombre" class="form-control"> <?php echo $propiedad['precio'];?> </p>
				</div>
			</div>
			<div class="row">					
				<div class="col-sm-6 form-group">
					<label>Direccion</label>
					<span readonly id="nombre" class="form-control"> <?php echo $propiedad_ubicacion['calle'];?>, <?php echo $propiedad_ubicacion['numero'];?>, <?php echo $propiedad_ubicacion['piso'];?>, <?php echo $propiedad_ubicacion['departamento'];?> </span>
				</div>
				<div class="col-sm-6 form-group">
					<label>Tipo de Propiedad</label>
					<span readonly id="nombre" class="form-control"> <?php echo $tipo_propiedad['nombre'];?> </span>
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
					<span readonly id="nombre" class="form-control"> <?php echo $propiedad["wifi"];?> </span>
				</div>	
				<div class="col-sm-2 form-group">
					<label>Cochera</label>
					<span readonly id="nombre" class="form-control"> <?php echo $propiedad["cochera"];?> </span>
				</div>						
			<div class="row">					
				<div class="col-sm-12 form-group">
					<label>Descripcion</label>
					<textarea readonly type="long-text" maxlength="800" name="descripcion" id="descripcion" rows="4" value="<?php echo $row2['descripcion'];?>" class="form-control"> <?php echo $propiedad["descripcion"];?> </textarea>
				</div>	
			</div>
			<div align="center">
				<button type="submit" class="btn btn-primary navbar-btn">Alquilar</button>
			</div>
		</div>
	</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>