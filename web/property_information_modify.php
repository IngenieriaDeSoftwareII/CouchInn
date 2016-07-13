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
				var tipo_propiedad = document.getElementsByName("tipo_propiedad")[0].value;
				// <?php
			 //    if ($_SESSION['rol'] == 1){
				// 	echo 'var image = document.getElementById("normal_image").value;';
		  //       }
		  //       else{
		  //          	echo 'var image = document.getElementById("premium_image").value;';
		  //       }
			 //    ?>
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
				if (tipo_propiedad == ''){
					alert("Por favor ingrese el tipo de la propiedad.");
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
				// if (image == ''){
				// 	alert("Por favor ingrese una imagen de la propiedad.");
				// 	return false;
				// }
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
			if (!isset ($_SESSION['rol'])){
		      header("Location: index.php");
		    }
		    else{
				include 'taskbar_manager.php';
			}
	    	include 'conexion.php';
	    	
			$result = mysql_query("SELECT * FROM propiedad WHERE id_propiedad =  '$id_propiedad'");
			$propiedad = mysql_fetch_array($result);
			$result1 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$propiedad[id_ubicacion]'");
			$propiedad_ubicacion = mysql_fetch_array($result1);
			$result2 = mysql_query("SELECT * FROM tipo_propiedad WHERE id_tipo_propiedad = '$propiedad[id_tipo_propiedad]'");
			$tipo_propiedad = mysql_fetch_array($result2);
			$result4 = mysql_query("SELECT * FROM foto WHERE id_propiedad = '$propiedad[id_propiedad]'");
			$foto_propiedad = mysql_fetch_array($result4);
	    ?>

		<div class="container">
			<h1 class="well">Modificar Propiedad</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form" method="post" onsubmit="return publish_validation()" action="property_information_modify_check.php" enctype="multipart/form-data">
						<div class="col-sm-12">
							<div class="row">					
								<div class="col-sm-12 form-group">
									<label>Nombre de la propiedad</label>
									<input type="text" maxlength="100" name="nombre" id="nombre" value="<?php echo $propiedad["nombre"];?>" placeholder="Ingresa el nombre aqui.." class="form-control">
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Calle</label>
									<input name="calle" maxlength="100" id="calle" type="text" value="<?php echo $propiedad_ubicacion["calle"];?>" placeholder="Ingresa la calle aqui.." class="form-control">
								</div>			
								<div class="col-sm-3 form-group">
									<label>Numero</label>
									<input name="numero" maxlength="11" id="numero" onkeypress="return justNumbers(event);" type="text" value="<?php echo $propiedad_ubicacion["numero"];?>" placeholder="Ingresa el numero aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Piso</label>
									<input name="piso" maxlength="11" id="piso" type="text" value="<?php echo $propiedad_ubicacion["piso"];?>" placeholder="Ingresa el piso aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Departamento</label>
									<input name="departamento" id="departamento" maxlength="100" type="text" value="<?php echo $propiedad_ubicacion["departamento"];?>" placeholder="Ingresa el departamento aqui.." class="form-control">
								</div>		
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<input name="pais" id="pais" maxlength="100" type="text" placeholder="Ingresa el pais aqui.." value="<?php echo $propiedad_ubicacion["pais"];?>" class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<input name="provincia" id="provincia" maxlength="100" type="text" value="<?php echo $propiedad_ubicacion["provincia"];?>" placeholder="Ingresa la provincia aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<input name="ciudad" id="ciudad" maxlength="100" type="text" value="<?php echo $propiedad_ubicacion["ciudad"];?>" placeholder="Ingresa la ciudad aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Codigo postal</label>
									<input name="codigo_postal" id="codigo_postal" maxlength="11" type="text" value="<?php echo $propiedad_ubicacion["codigo_postal"];?>" placeholder="Ingresa el codigo postal aqui.." class="form-control">
								</div>		
							</div>					
							<div class="row">
								<div class="col-sm-6 form-group">
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
				              						<option value="<?php echo htmlspecialchars($var);?>" <?php if ($propiedad["id_tipo_propiedad"] == $var){ echo 'selected'; } ?>> <?php echo $tipo_propiedad["nombre"];?> </option>
				              					<?php
												}
												?>
											</select>
			            				</dd>
			          				</dl>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Precio</label>
									<input name="precio" id="precio" maxlength="10" onkeypress="return justNumbers(event);" type="text" value="<?php echo $propiedad["precio"];?>" placeholder="Ingresa el precio aqui.." class="form-control">	
								</div>
								<div class="col-sm-2 form-group">
									<label>Capacidad</label>
									<input name="capacidad" id="capacidad" maxlength="2" onkeypress="return justNumbers(event);" value="<?php echo $propiedad["capacidad"];?>" type="number" min=0 max=20 class="form-control">	
								</div>	
								<div class="col-sm-2 form-group">
									<label>Habitaciones</label>
									<input name="habitaciones" id="habitaciones" maxlength="2" onkeypress="return justNumbers(event);" value="<?php echo $propiedad["numero_habitaciones"];?>" type="number" min=0 max=10 class="form-control">	
								</div>	
								<div class="col-sm-2 form-group">
									<label>Baños</label>
									<input name="banos" id="banos" maxlength="2" onkeypress="return justNumbers(event);" value="<?php echo $propiedad["numero_banos"];?>" type="number" min=0 max=10 class="form-control">	
								</div>			
								<div class="col-sm-1 form-group">
									<label>Wifi</label>
									<input name="wifi" id="wifi" <?php if ($propiedad["wifi"] == 1){ echo 'checked'; }?> type="checkbox" value="1" class="form-control">	
								</div>	
								<div class="col-sm-1 form-group">
									<label>Cochera</label>
									<input name="cochera" id="cochera" <?php if ($propiedad["cochera"] == 1){ echo 'checked'; }?> type="checkbox" value="1" class="form-control">	
								</div>	
							</div>					
							<div class="row">					
								<div class="col-sm-12 form-group">
									<label>Descripcion</label>
									<textarea type="long-text" maxlength="800" name="descripcion" id="descripcion" rows="4" value="<?php echo $propiedad['descripcion'];?>" class="form-control"> <?php echo $propiedad["descripcion"];?> </textarea>
								</div>	
							</div>
				                <?php
			    				if ($_SESSION['rol'] == 1){
								?>
									<div class="form-group">
	                    				<label>Modificar imagen</label>
	                    				<input id="normal_image" name="imagen[]" type="file" multiple=true>
	                				</div>
                				<?php
			            		}
			            		else{
			            		?>
			            			<div class="form-group">
                    					<label>Agregar imagenes</label>
                    					<input id="premium_image" name="imagen[]" type="file" multiple max=5>
                					</div>
                				<?php
			            		}
			            		?>
				            <hr>
							<div align="center">
								<button type="submit" name="modificar" id="modificar" value="<?php echo htmlspecialchars($propiedad['id_propiedad']);?>" class="btn btn-warning navbar-btn">Modificar propiedad</button>
								<button type="reset" class="btn btn-danger navbar-btn" onClick="window.location.href='javascript:history.back(-1);'">Cancelar</button>
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