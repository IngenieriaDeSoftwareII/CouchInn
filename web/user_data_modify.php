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
		    function modify_validation(){
				var nombre = document.getElementById("nombre").value;
				var apellido = document.getElementById("apellido").value;
				var dni = document.getElementById("dni").value;
				var username = document.getElementById("username").value;
				var password = document.getElementById("password").value;
				var calle = document.getElementById("calle").value;
				var numero = document.getElementById("numero").value;
				var piso = document.getElementById("piso").value;
				var departamento = document.getElementById("departamento").value;
				var pais = document.getElementById("pais").value;
				var provincia = document.getElementById("provincia").value;
				var ciudad = document.getElementById("ciudad").value;
				var codigo_postal = document.getElementById("codigo_postal").value;
				var telefono = document.getElementById("telefono").value;
				var email = document.getElementById("email").value;

				if (nombre == ''){
					alert("Por favor ingrese su nombre.");
					return false;
				}
				if (apellido == ''){
					alert("Por favor ingrese su apellido.");
					return false;
				}
				if (dni == ''){
					alert("Por favor ingrese su dni.");
					return false;
				}
				if (username == ''){
					alert("Por favor ingrese su nombre de usuario.");
					return false;
				}
				if (password == ''){
					alert("Por favor ingrese su contraseña.");
					return false;
				}
				if (calle == ''){
					alert("Por favor ingrese su calle.");
					return false;
				}
				if (numero == ''){
					alert("Por favor ingrese su numero.");
					return false;
				}
				if (pais == ''){
					alert("Por favor ingrese su pais.");
					return false;
				}
				if (provincia == ''){
					alert("Por favor ingrese su provincia.");
					return false;
				}
				if (ciudad == ''){
					alert("Por favor ingrese su ciudad.");
					return false;
				}
				if (codigo_postal == ''){
					alert("Por favor ingrese su codigo postal.");
					return false;
				}
				if (telefono == ''){
					alert("Por favor ingrese su telefono.");
					return false;
				}
				if (email == ''){
					alert("Por favor ingrese su email.");
					return false;
				}
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
			};
	    	include 'conexion.php';
			
			$result = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$_SESSION[id_usuario]'");
			$usuario = mysql_fetch_array($result);

			$result2 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$usuario[id_ubicacion]'");
			$usuario_ubicacion = mysql_fetch_array($result2);
	    ?>
	    <div class="container">
	    	<h1 class="well">Modifique su Informacion Personal</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form1" method="post" action="user_data_modify_check.php" onsubmit="return modify_validation()">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Nombre</label>
									<input type="text" maxlength="100" id="nombre" name="nombre" value="<?php echo $usuario["nombre"];?>" class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>Apellido</label>
									<input type="text" maxlength="100" id="apellido" name="apellido" value="<?php echo $usuario["apellido"];?>" class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>DNI</label>
									<input type="text" maxlength="8" id="dni" name="dni" value="<?php echo $usuario["dni"];?>" class="form-control">
								</div>
							</div>
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Nombre de Usuario</label>
									<span id="nombre" class="form-control"> <?php echo $usuario["nombre_usuario"];?> </span>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Contraseña</label>
									<input type="password" type="text" id="password" name="password" maxlength="16" value="<?php echo $usuario["contrasena"];?>" class="form-control"></input>
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Calle</label>
									<input name="calle" maxlength="100" id="calle" type="text" value="<?php echo $usuario_ubicacion["calle"];?>" class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Numero</label>
									<input name="numero" maxlength="11" id="numero" type="text" value="<?php echo $usuario_ubicacion["numero"];?>" class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Piso</label>
									<input name="piso" maxlength="11" id="piso" type="text" value="<?php echo $usuario_ubicacion["piso"];?>" class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Departamento</label>
									<input name="departamento" id="departamento" maxlength="100" type="text" value="<?php echo $usuario_ubicacion["departamento"];?>" class="form-control">
								</div>		
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<input name="pais" id="pais" maxlength="100" type="text" value="<?php echo $usuario_ubicacion["pais"];?>" class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<input name="provincia" id="provincia" maxlength="100" type="text" value="<?php echo $usuario_ubicacion["provincia"];?>" class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<input name="ciudad" id="ciudad" maxlength="100" type="text" value="<?php echo $usuario_ubicacion["ciudad"];?>" class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Codigo postal</label>
									<input name="codigo_postal" id="codigo_postal" maxlength="11" type="text" value="<?php echo $usuario_ubicacion["codigo_postal"];?>" class="form-control">
								</div>		
							</div>					
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Telefono</label>
									<input name="telefono" id="telefono" maxlength="100" value="<?php echo $usuario["telefono"];?>" class="form-control"></input>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Email</label>
									<input name="email" id="email" maxlength="100" value="<?php echo $usuario["email"];?>" class="form-control"></input>
								</div>	
							</div>
						<br></br>
						<div align="center">
							<button type="submit" class="btn btn-primary navbar-btn">Aceptar</button>	
							<button type="button" class="btn btn-danger navbar-btn" onClick="window.location.href='user_data_list.php'">Cancelar</button>
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