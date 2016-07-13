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
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="jquery.ui.datepicker-es.js"></script>

		<script>
			$(function() {
				//Array para dar formato en español
				$.datepicker.regional['es'] ={
					closeText: 'Cerrar',
					prevText: 'Previo',
					nextText: 'Próximo',
					monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
					monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
					dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					dateFormat: 'dd/mm/yy', firstDay: 0,
					initStatus: 'Selecciona la fecha', isRTL: false
				};
				$.datepicker.setDefaults($.datepicker.regional['es']);
				//miDate: fecha de comienzo D=días | M=mes | Y=año
				//maxDate: fecha tope D=días | M=mes | Y=año
			 	$( "#fecha1" ).datepicker({ minDate: "D", maxDate: "" });
			 	$( "#fecha2" ).datepicker({ minDate: "D", maxDate: "" });
			});

			function justNumbers(e){
		        var keynum = window.event ? window.event.keyCode : e.which;
		        if ((keynum == 8) || (keynum == 46))
		        return true;
		         
		        return /\d/.test(String.fromCharCode(keynum));
	        }
		</script>
		<script type="text/javascript">
			function query_validation(){
				var fecha1 = document.getElementById("fecha1").value;
				var fecha2 = document.getElementById("fecha2").value;
				var numero_tarjeta = document.getElementById("numero_tarjeta").value;
				var codigo_seguridad = document.getElementById("codigo_seguridad").value;
				if (fecha1 == ''){
					alert("Por favor ingrese la fecha de inicio.");
					return false;
				}
				if (fecha2 == ''){
					alert("Por favor ingrese la fecha de fin.");
					return false;
				}
				if (numero_tarjeta == ''){
					alert("Por favor ingrese el numero de tarjeta.");
					return false;
				}
				if (codigo_seguridad == ''){
					alert("Por favor ingrese el codigo de seguridad.");
					return false;
				}
				if (fecha1 > fecha2){
					alert("La fecha de llegada no puede ser posterior a la de partida");
					return false;
				}
			}
		</script>
  	</head>
  	<body>
    	<?php
			if (!isset ($_SESSION['rol'])){
		      header("Location: login.php");
		    }
		    else{
				include 'taskbar_manager.php';
			}		
			include 'conexion.php';
			//echo $_POST['prop'];
			$query = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$_GET[id_propiedad]'");
	    	$result = mysql_fetch_array($query);
		?>

		 <div class="container">
    	<h1 class="well">Alquiler de Propiedad</h1>
		</div>

		<div class="container">
			<div class="col-lg-12 well">
					<form name="form1" method="post" action="property_reservation_check.php" onsubmit="return query_validation()">
						<div class="row">
							<div class="col-sm-3 form-group">
								<label>Nombre de la Propiedad</label>
								<p readonly id="nombre" class="form-control"> <?php echo $result['nombre'];?> </p>
							</div>
							<div class="col-sm-3 form-group">
								<label>Precio por dia</label>
								<p readonly id="nombre" class="form-control"> <?php echo $result['precio'];?> </p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 form-group">
								<label for="fecha">Fecha de llegada
								<input type="text" class="form-control" name="fecha1" id="fecha1" required="required" value="" />
								</label>
							</div>
							<div class="col-sm-3 form-group">
								<label for="fecha">Fecha de partida
								<input type="text" class="form-control" name="fecha2" id="fecha2" value="" />
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 form-group">
								<label>Numero de Tarjeta</label>
								<input type="text" maxlength="16" onkeypress="return justNumbers(event);" name="numero_tarjeta" id="numero_tarjeta" placeholder="Numero de tarjeta" class="form-control">
							</div>
							<div class="col-sm-3 form-group">
								<label>Codigo de Seguridad</label>
								<textarea type="password" maxlength="3" onkeypress="return justNumbers(event);" name="codigo_seguridad" id="codigo_seguridad" rows="1" placeholder="Codigo de seguridad" class="form-control"></textarea>
							</div>		
						</div>
						<div align="center">
							<div>
								<button type="submit" class="btn btn-default navbar-btn" name="prop" id="prop" value="<?php echo $_GET['id_propiedad'];?>">Alquilar</button>
							</div>
						</div>
					</form>	
			</div>					
		</div>
    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="jquery.ui.datepicker-es.js"></script>
  	</body>
</html>