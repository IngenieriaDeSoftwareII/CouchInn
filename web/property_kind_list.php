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
	    	<h1 class="well">Listado de Tipos de Propiedades</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form1" method="post" action="checkregistro.php">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Nombre</label>
									<input type="text" maxlength="100" name="nombre" placeholder="Ingresa tu nombre aqui.." class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>Apellido</label>
									<input type="text" maxlength="100" name="apellido"placeholder="Ingresa tu apellido aqui.." class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>DNI</label>
									<input type="text" maxlength="8" name="dni"placeholder="Ingresa tu DNI aqui.." class="form-control">
								</div>
							</div>
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Nombre de Usuario</label>
									<input name="username" type="text" maxlength="24" placeholder="Ingresa tu nombre de usuario aqui.." class="form-control"></input>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Contraseña</label>
									<input type="password" type="text" name="password" maxlength="16" placeholder="Ingresa tu contraseña aqui.." class="form-control"></input>
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Calle</label>
									<input name="calle" maxlength="100" type="text" placeholder="Ingresa tu calle aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Numero</label>
									<input name="numero" maxlength="11" type="text" placeholder="Ingresa tu numero aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Piso</label>
									<input name="piso" maxlength="11" type="text" placeholder="Ingresa tu piso aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Departamento</label>
									<input name="departamento" maxlength="100" type="text" placeholder="Ingresa tu departamento aqui.." class="form-control">
								</div>		
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<input name="pais" maxlength="100" type="text" placeholder="Ingresa tu pais aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<input name="provincia" maxlength="100" type="text" placeholder="Ingresa tu provincia aqui.." class="form-control">
								</div>	
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<input name="ciudad" maxlength="100" type="text" placeholder="Ingresa tu ciudad aqui.." class="form-control">
								</div>		
								<div class="col-sm-3 form-group">
									<label>Codigo postal</label>
									<input name="codigo_postal" maxlength="11" type="text" placeholder="Ingresa tu codigo postal aqui.." class="form-control">
								</div>		
							</div>					
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Telefono</label>
									<input name="telefono" maxlength="100" placeholder="Ingresa tu telefono aqui.." class="form-control"></input>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Email</label>
									<input name="email" maxlength="100" placeholder="Ingresa tu email aqui.." class="form-control"></input>
								</div>	
							</div>
						<br></br>
						<div align="center">
							<button type="submit" class="btn btn-primary navbar-btn">Registrarme</button>	
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