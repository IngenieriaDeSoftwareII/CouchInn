<?php
session_start();
if (isset ($_SESSION['rol'])){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Couch Inn - Reserva tu proximo Hospedaje!</title>
	 
	    <!-- CSS de Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    function register_validation(){
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
	    if (isset ($_SESSION['rol'])){
	      header("Location: index.php");
	    }
	    else{
	      include 'guest_taskbar.php';
	    }
	    ?>

	    <nav>
		    <div align="center">
		        <a href="index.php"> <img src="images/Logo2.png" width="600" height="125"> </a>
		        <h3>Bienvenido a Couch Inn</h3> 
		    </div>
	    </nav>
	    <div class="container">
	    	<h1 class="well">Registrarse</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form1" method="post" action="register_check.php" onsubmit="return register_validation()">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Nombre</label>
									<input type="text" maxlength="100" id="nombre" name="nombre" placeholder="Ingresa tu nombre aqui.." class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>Apellido</label>
									<input type="text" maxlength="100" id="apellido" name="apellido" placeholder="Ingresa tu apellido aqui.." class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>DNI</label>
									<input type="text" maxlength="8" id="dni" name="dni" placeholder="Ingresa tu DNI aqui.." class="form-control">
								</div>
							</div>
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Nombre de Usuario</label>
									<input name="username" type="text" id="username" maxlength="24" placeholder="Ingresa tu nombre de usuario aqui.." class="form-control"></input>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Contraseña</label>
									<input type="password" type="text" id="password" name="password" maxlength="16" placeholder="Ingresa tu contraseña aqui.." class="form-control"></input>
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Calle</label>
									<input name="calle" maxlength="100" id="calle" type="text" placeholder="Ingresa tu calle aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Numero</label>
									<input name="numero" maxlength="11" id="numero" type="text" placeholder="Ingresa tu numero aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Piso</label>
									<input name="piso" maxlength="11" id="piso" type="text" placeholder="Ingresa tu piso aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Departamento</label>
									<input name="departamento" id="departamento" maxlength="100" type="text" placeholder="Ingresa tu departamento aqui.." class="form-control">
								</div>		
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<input name="pais" id="pais" maxlength="100" type="text" placeholder="Ingresa tu pais aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<input name="provincia" id="provincia" maxlength="100" type="text" placeholder="Ingresa tu provincia aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<input name="ciudad" id="ciudad" maxlength="100" type="text" placeholder="Ingresa tu ciudad aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Codigo postal</label>
									<input name="codigo_postal" id="codigo_postal" maxlength="11" type="text" placeholder="Ingresa tu codigo postal aqui.." class="form-control">
								</div>		
							</div>					
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Telefono</label>
									<input name="telefono" id="telefono" maxlength="100" placeholder="Ingresa tu telefono aqui.." class="form-control"></input>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Email</label>
									<input name="email" id="email" maxlength="100" placeholder="Ingresa tu email aqui.." class="form-control"></input>
								</div>	
							</div>
						<br></br>
						<div align="center">
							<button type="submit" class="btn btn-primary navbar-btn">Registrarme</button>	
							<button type="reset" class="btn btn-default navbar-btn">Restablecer</button>
						</div>				
						</div>
					</form> 
					</div>
		</div>
		</div>
 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>