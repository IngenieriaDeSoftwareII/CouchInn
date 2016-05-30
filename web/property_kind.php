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
			if ($_SESSION['rol'] == 0){
				header("Location: index.php");
			}
			else{
				include 'admin_taskbar.php';
			}
		}
		else{
			header("Location: index.php");
		}
		?>

	    <nav>
		    <div align="center">
		        <a href="index.php"> <img src="Logo2.png" width="600" height="125"> </a>
		        <h3>Bienvenido a Couch Inn</h3> 
		    </div>
	    </nav>
	    <div class="container">
	    	<h1 class="well">Registrar un nuevo tipo de propiedad</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form2" method="post" action="property_kind_check.php">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Nombre</label>
									<input type="text" maxlength="100" name="nombre" placeholder="Ingresa el nombre aqui.." class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Descripción</label>
									<textarea type="long-text" maxlength="800" name="descripcion" rows="6" placeholder="Ingresa la descripción aqui.." class="form-control"></textarea>
								</div>				
							</div>
						<br></br>
						<div align="center">
						<button type="submit" class="btn btn-primary navbar-btn">Agregar</button>	
						</div>				
						</div>
					</form> 
					</div>
		</div>
		</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>