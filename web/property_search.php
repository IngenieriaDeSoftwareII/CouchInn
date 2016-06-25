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
	    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

	    <script language="Javascript"> 
	  //   function publish_validation(){
			// 	var precio = document.getElementById("precio").value;
			// 	var habitaciones = document.getElementById("habitaciones").value;
			// 	var capacidad = document.getElementById("capacidad").value;
			// 	var banos = document.getElementById("banos").value;
			// 	var pais = document.getElementById("pais").value;
			// 	var provincia = document.getElementById("provincia").value;
			// 	var ciudad = document.getElementById("ciudad").value;
			// 	var tipo_propiedad = document.getElementsByName("tipo_propiedad")[0].value;
			// 	if (tipo_propiedad == ''){
			// 		alert("Por favor ingrese el tipo de la propiedad.");
			// 		return false;
			// 	}
			// 	if (ciudad == ''){
			// 		alert("Por favor ingrese la ciudad de la propiedad.");
			// 		return false;
			// 	}
			// 	if (provincia == ''){
			// 		alert("Por favor ingrese la provincia de la propiedad.");
			// 		return false;
			// 	}
			// 	if (pais == ''){
			// 		alert("Por favor ingrese el pais de la propiedad.");
			// 		return false;
			// 	}

			// 	if (precio == ''){
			// 		alert("Por favor ingrese el precio de la propiedad.");
			// 		return false;
			// 	}
			// 	if (capacidad == ''){
			// 		alert("Por favor ingrese la capacidad de la propiedad.");
			// 		return false;
			// 	}
			// 	if (habitaciones == ''){
			// 		alert("Por favor ingrese el numero de habitaciones de la propiedad.");
			// 		return false;
			// 	}
			// 	if (banos == ''){
			// 		alert("Por favor ingrese el numero de baños de la propiedad.");
			// 		return false;
			// 	}
			// }
			function justNumbers(e){
		        var keynum = window.event ? window.event.keyCode : e.which;
		        if ((keynum == 8) || (keynum == 46))
		        return true;
		         
		        return /\d/.test(String.fromCharCode(keynum));
	        }
	        function listar(){
	        	<?php
	        		include 'property_search_check';
	        	?>
	        }
	    </script>
  	</head>
  	<body>					
  		<?php
		    include 'taskbar_manager.php';
		?>

		<div class="container">
			<h1 class="well">Buscar Propiedades</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form" method="post" action="property_search_check.php" enctype="multipart/form-data">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-3 form-group">
									<dl class="form-group">
			            				<dt><label>Tipo de Propiedad</label></dt>
			            				<dd>
			              					<select class="form-control" name='tipo_propiedad'>
			              						<option value=""></option>
			              						<?php
			              						include 'conexion.php';
			              						$result = mysql_query("SELECT * FROM tipo_propiedad");
												while ($tipo_propiedad = mysql_fetch_array($result)){
													$var = $tipo_propiedad["id_tipo_propiedad"];
												?>
				              						<option value="<?php echo htmlspecialchars($var);?>"><?php echo $tipo_propiedad["nombre"];?></option>
				              					<?php
												}
												?>
											</select>
			            				</dd>
			          				</dl>
								</div>
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<input name="ciudad" id="ciudad" maxlength="100" type="text" placeholder="Ingresa la ciudad aqui.." class="form-control">
								</div>
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<input name="provincia" id="provincia" maxlength="100" type="text" placeholder="Ingresa la provincia aqui.." class="form-control">
								</div>
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<input name="pais" id="pais" maxlength="100" type="text" placeholder="Ingresa el pais aqui.." class="form-control">
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Precio</label>
									<input name="precio" id="precio" maxlength="10" onkeypress="return justNumbers(event);" type="text" placeholder="Ingresa el precio aqui.." class="form-control">	
								</div>
								<div class="col-sm-2 form-group">
									<label>Capacidad</label>
									<input name="capacidad" id="capacidad" maxlength="2" onkeypress="return justNumbers(event);" type="number" min=0 max=20 class="form-control">	
								</div>	
								<div class="col-sm-2 form-group">
									<label>Habitaciones</label>
									<input name="habitaciones" maxlength="2" onkeypress="return justNumbers(event);" id="habitaciones" type="number" min=0 max=10 class="form-control">	
								</div>	
								<div class="col-sm-2 form-group">
									<label>Baños</label>
									<input name="banos" id="banos" maxlength="2" onkeypress="return justNumbers(event);" type="number" min=0 max=10 class="form-control">	
								</div>			
<!-- 								<div class="col-sm-1 form-group">
									<label>Wifi</label>
									<input name="wifi" id="wifi" type="checkbox" value="1" class="form-control">	
								</div>	
								<div class="col-sm-1 form-group">
									<label>Cochera</label>
									<input name="cochera" id="cochera" type="checkbox" value="1" class="form-control">	
								</div>	 -->
							</div>					
							<div align="center">
								<button type="submit" class="btn btn-primary navbar-btn">Buscar</button>
								<button type="reset" class="btn btn-default navbar-btn">Restablecer</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/fileinput.js" type="text/javascript"></script>
        <script src="js/fileinput_locale_fr.js" type="text/javascript"></script>
        <script src="js/fileinput_locale_es.js" type="text/javascript"></script>
  	</body>
</html>