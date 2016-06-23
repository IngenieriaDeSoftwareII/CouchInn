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
			 	$( "#fecha1" ).datepicker({ minDate: "", maxDate: "D" });
			 	$( "#fecha2" ).datepicker({ minDate: "", maxDate: "D" });
			});
		</script>
		<script type="text/javascript">
			function query_validation(){
				var fecha1 = document.getElementById("fecha1").value;
				var fecha2 = document.getElementById("fecha2").value;
				if (fecha1 == ''){
					alert("Por favor ingrese la fecha de inicio.");
					return false;
				}
				if (fecha2 == ''){
					alert("Por favor ingrese la fecha de fin.");
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
		
		// Conectando, seleccionando la base de datos
		$con = mysql_connect('localhost', 'root', '') or die ("No se pudo conectar a la BD");
		mysql_select_db("couchInn", $con) or die ("No se pudo conectar a la BD");
		?>

		<div class="container">
			<h1 class="well">Listado de Usuarios</h1>
				<div class="container">
					<form name="form1" method="post" action="admin_users_list_check.php" onsubmit="return query_validation()">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label for="fecha">Desde Fecha:
									<input type="text" name="fecha1" id="fecha1" required="required" value="" />
								</label>
							</div>
							<div class="col-sm-4 form-group">
								<label for="fecha">Hasta Fecha:
									<input type="text" name="fecha2" id="fecha2" value="" />
								</label>
							</div>
							<td> <button type="submit" name="preguntas" id="preguntas" value="<?php echo htmlspecialchars($var);?>" class="btn btn-primary navbar-btn" >Buscar</button> </td>
						</div>
					</form>							
				</div></br>
				<form name="form" method="post" action="user_premium_manager.php">
					<div class="panel panel-default">
						<table class="table">
						    <tr>
						    	<td><strong>Nombre_Usuario</strong></td>
								<td><strong>Contrasena</strong></td>
								<td><strong>Nombre</strong></td>
								<td><strong>Apellido</strong></td>
								<td><strong>DNI</strong></td>
								<td><strong>Telefono</strong></td>
								<td><strong>Email</strong></td>
								<td><strong>Fecha Registro</strong></td>
							</tr>
							<?php
							$result = mysql_query("SELECT * FROM usuario");
							while ($tabla = mysql_fetch_array($result)){ 
								$var = $tabla["id_usuario"];
								?>
								<tr>
									<td> <?php echo $tabla["nombre_usuario"];?></td>
									<td> <?php echo $tabla["contrasena"];?></td>
									<td> <?php echo $tabla["nombre"];?></td>
									<td> <?php echo $tabla["apellido"];?></td>
									<td> <?php echo $tabla["dni"];?></td>
									<td> <?php echo $tabla["telefono"];?></td>
									<td> <?php echo $tabla["email"];?></td>
									<td> <?php echo $tabla["fecha_registro"];?></td>
									<?php
										if ($tabla['rol'] == 1){
											?>
											<td> <center> <button type="submit" name="premium" id="premium" value="<?php echo htmlspecialchars($var);?>" class="btn btn-warning btn-group-xs">Hacer Premium</button> </td>
										<?php
										}
										else{
											if ($tabla['rol'] == 2){
												?>
												<td> <center> <button type="submit" name="regular" id="regular" value="<?php echo htmlspecialchars($var);?>" class="btn btn-danger btn-group-xs">Quitar Premium</button> </td>
											<?php
											}
											else{
												echo '<td><b><center>Admin</b></td>';
											}
										}
									?>
								</tr>
							<?php
							}
							?>
						  </table>
					</div>
				</form>
		</div>
    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="jquery.ui.datepicker-es.js"></script>
  	</body>
</html>