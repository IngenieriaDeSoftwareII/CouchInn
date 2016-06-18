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
	    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

	    <script language="Javascript"> 
			function publish_validation(){
				var nombre = document.getElementById("nombre").value;
				var precio = document.getElementById("precio").value;
				var habitaciones = document.getElementById("habitaciones").value;
				var capacidad = document.getElementById("capacidad").value;
				var banos = document.getElementById("banos").value;
				var calle = document.getElementById("calle").value;
				var numero = document.getElementById("numero").value;
				var pais = document.getElementById("pais").value;
				var provincia = document.getElementById("provincia").value;
				var ciudad = document.getElementById("ciudad").value;
				var codigo_postal = document.getElementById("codigo_postal").value;
				<?php
			    if ($_SESSION['rol'] == 1){
					echo 'var image = document.getElementById("normal_image").value;';
		        }
		        else{
		           	echo 'var image = document.getElementById("premium_image").value;';
		        }
			    ?>
			    if (nombre == ''){
					alert("Por favor ingrese el nombre de la propiedad.");
					return false;
				}
				if (calle == ''){
					alert("Por favor ingrese la calle de la propiedad.");
					return false;
				}
				if (numero == ''){
					alert("Por favor ingrese el numero de la propiedad.");
					return false;
				}
				if (pais == ''){
					alert("Por favor ingrese el pais de la propiedad.");
					return false;
				}
				if (provincia == ''){
					alert("Por favor ingrese la provincia de la propiedad.");
					return false;
				}
				if (ciudad == ''){
					alert("Por favor ingrese la ciudad de la propiedad.");
					return false;
				}
				if (codigo_postal == ''){
					alert("Por favor ingrese el codigo postal de la propiedad.");
					return false;
				}
				if (precio == ''){
					alert("Por favor ingrese el precio de la propiedad.");
					return false;
				}
				if (habitaciones == ''){
					alert("Por favor ingrese el numero de habitaciones de la propiedad.");
					return false;
				}
				if (capacidad == ''){
					alert("Por favor ingrese la capacidad de la propiedad.");
					return false;
				}
				if (banos == ''){
					alert("Por favor ingrese el numero de baños de la propiedad.");
					return false;
				}
				if (image == ''){
					alert("Por favor ingrese una imagen de la propiedad.");
					return false;
				}
			}
			function justNumbers(e){
		        var keynum = window.event ? window.event.keyCode : e.which;
		        if ((keynum == 8) || (keynum == 46))
		        return true;
		         
		        return /\d/.test(String.fromCharCode(keynum));
	        }
	    </script>
  	</head>
  	<body>					
  		<?php
		include 'taskbar_manager.php';
		?>
		<div class="container">
			<h1 class="well">Registrar Propiedad</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form" method="post" onsubmit="return publish_validation()" action="property_publish_check.php">
						<div class="col-sm-12">
							<div class="row">					
								<div class="col-sm-12 form-group">
									<label>Nombre de la propiedad</label>
									<input type="text" maxlength="100" name="nombre" id="nombre" placeholder="Ingresa el nombre aqui.." class="form-control">
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Calle</label>
									<input name="calle" maxlength="100" id="calle" type="text" placeholder="Ingresa la calle aqui.." class="form-control">
								</div>			
								<div class="col-sm-3 form-group">
									<label>Numero</label>
									<input name="numero" maxlength="11" id="numero" type="text" placeholder="Ingresa el numero aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Piso</label>
									<input name="piso" maxlength="11" id="piso" type="text" placeholder="Ingresa el piso aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Departamento</label>
									<input name="departamento" id="departamento" maxlength="100" type="text" placeholder="Ingresa el departamento aqui.." class="form-control">
								</div>		
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<input name="pais" id="pais" maxlength="100" type="text" placeholder="Ingresa el pais aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<input name="provincia" id="provincia" maxlength="100" type="text" placeholder="Ingresa la provincia aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<input name="ciudad" id="ciudad" maxlength="100" type="text" placeholder="Ingresa la ciudad aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Codigo postal</label>
									<input name="codigo_postal" id="codigo_postal" maxlength="11" type="text" placeholder="Ingresa el codigo postal aqui.." class="form-control">
								</div>		
							</div>					
							<div class="row">
								<div class="col-sm-8 form-group">
									<dl class="form-group">
			            				<dt><label>Tipo de Propiedad</label></dt>
			            				<dd>
			              					<select class="form-select select">
			              						<option id="tipo_propiedad"value=""></option>
			              						<?php
			              						include 'conexion.php';
			              						$result = mysql_query("SELECT * FROM tipo_propiedad");
												while ($tipo_propiedad = mysql_fetch_array($result)){
													$var = $tipo_propiedad["id_tipo_propiedad"];
												?>
				              						<option id="tipo_propiedad" value="<?php echo htmlspecialchars($var);?>"><?php echo $tipo_propiedad["nombre"];?></option>
				              					<?php
												}
												?>
											</select>
			            				</dd>
			          				</dl>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2 form-group">
									<label>Precio</label>
									<input name="precio" id="precio" onkeypress="return justNumbers(event);" type="text" placeholder="Ingresa el precio aqui.." class="form-control">	
								</div>
								<div class="col-sm-1 form-group">
									<label>Capacidad</label>
									<input name="capacidad" id="capacidad" type="number" min=0 max=20 class="form-control">	
								</div>	
								<div class="col-sm-1 form-group">
									<label>Habitaciones</label>
									<input name="habitaciones" id="habitaciones" type="number" min=0 max=10 class="form-control">	
								</div>	
								<div class="col-sm-1 form-group">
									<label>Baños</label>
									<input name="banos" id="banos" type="number" min=0 max=10 class="form-control">	
								</div>			
								<div class="col-sm-1 form-group">
									<label>Wifi</label>
									<input name="wifi" id="wifi" type="checkbox" class="form-control">	
								</div>	
								<div class="col-sm-1 form-group">
									<label>Cochera</label>
									<input name="cochera" id="cochera" type="checkbox" class="form-control">	
								</div>	
							</div>					
							<div class="row">					
								<div class="col-sm-12 form-group">
									<label>Descripcion</label>
									<textarea type="long-text" maxlength="800" name="descripcion" id="descripcion" rows="6" placeholder="Ingresa la descripción aqui.." class="form-control"></textarea>
								</div>	
							</div>
							<form enctype="multipart/form-data">
				                <?php
			    				if ($_SESSION['rol'] == 1){
									echo 	'<div class="form-group">
                    							<label>Cargar imagen</label>
                    							<input id="normal_image" type="file" multiple=true>
                							</div>';
			            		}
			            		else{
			            			echo 	'<div class="form-group">
                    							<label>Cargar imagenes</label>
                    							<input id="premium_image" name="premium_image[]" type="file" multiple max=5>
                							</div>';
			            		}
			            		?>
				            </form>
				            <hr>
							<div align="center">
								<button type="submit" class="btn btn-primary navbar-btn">Registrar propiedad</button>
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
        <script>
		    $('#premium_image').fileinput({
		        language: 'es',
		        uploadUrl: '#',
		        browseClass: "btn btn-primary btn-lg",
		        allowedFileExtensions : ['jpg', 'png','gif'],
		        maxFileCount : 5,
		        minFileCount : 0,
		    });
			$("#normal_image").fileinput({
				showUpload: false,
				showCaption: false,
				browseClass: "btn btn-primary btn-lg",
		        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
		        allowedFileExtensions : ['jpg', 'png','gif'],
		        maxFileCount : 1,
		        minFileCount : 0,
			});
		</script>
  	</body>
</html>







LINEA 160, JUGANDO CON LOS IDS