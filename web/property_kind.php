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

	<script type="text/javascript">
    function property_kind_validation(){
		var nombre = document.getElementById("nombre").value;
		var descripcion = document.getElementById("descripcion").value;
		if (nombre == ''){
			alert("Por favor ingrese el nombre.");
			return false;
		}
		if (descripcion == ''){
			alert("Por favor ingrese la descripcion.");
			return false;
		}
	}
	</script>
  	</head>
  	<body>
    	<?php
		if (isset ($_SESSION['rol'])){
			if (($_SESSION['rol'] == 1) || ($_SESSION['rol'] == 2)){
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

	    <div class="container">
	    	<h1 class="well">Registrar un nuevo tipo de propiedad</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form2" method="post" action="property_kind_check.php" onsubmit="return property_kind_validation()">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Nombre</label>
									<input type="text" maxlength="100" name="nombre" id="nombre" placeholder="Ingresa el nombre aqui.." class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Descripción</label>
									<textarea type="long-text" maxlength="800" name="descripcion" id="descripcion" rows="6" placeholder="Ingresa la descripción aqui.." class="form-control"></textarea>
								</div>				
							</div>
						<br></br>
						<div align="center">
							<button type="submit" class="btn btn-primary navbar-btn">Agregar</button>	
							<button type="reset" class="btn btn-default navbar-btn">Restablecer</button>
						</div>
						<div align="center">
							<a href="property_kind_list.php"><button type="button" class="btn btn-warning navbar-btn">Ver Tipos de Propiedades</button></a>
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