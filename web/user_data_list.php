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

	    <script language="Javascript"> 
		// function confirmar(){ 
		// 	confirmar=confirm("¿Estas seguro que deseas eliminar tu cuenta de forma permanente?"); 
		// 	if (confirmar){
		// 		return true;
		// 	}
		// 	else{ 
		// 		return false; 
		// 	}
		// } 
		// </script>
  	</head>
  	<body>
    	<?php
			include 'taskbar_manager.php';
	    	$host_db = "localhost";
			$user_db = "root";
			$pass_db = ""; 

			$conexion = mysql_connect($host_db, $user_db, $pass_db);
			mysql_select_db('couchInn', $conexion) or die("No se puede seleccionar la base de datos.");
			
			$result = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$_SESSION[id_usuario]'");
			$usuario = mysql_fetch_array($result);

			$result2 = mysql_query("SELECT * FROM ubicacion WHERE id_ubicacion = '$usuario[id_ubicacion]'");
			$usuario_ubicacion = mysql_fetch_array($result2);


	    ?>
	    <div class="container">
	    	<h1 class="well">Mi Informacion Personal</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form1" method="post" action="user_data_modify.php" onsubmit="return confirmar()">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Nombre</label>
									<span id="nombre" class="form-control"> <?php echo $usuario['nombre'];?>  </span>
								</div>
								<div class="col-sm-4 form-group">
									<label>Apellido</label>
									<span id="nombre" class="form-control"> <?php echo $usuario['apellido'];?> </span>
								</div>
								<div class="col-sm-4 form-group">
									<label>DNI</label>
									<span id="nombre" class="form-control"> <?php echo $usuario["dni"];?> </span>
								</div>
							</div>
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Nombre de Usuario</label>
									<span id="nombre" class="form-control"> <?php echo $usuario["nombre_usuario"];?> </span>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Contraseña</label>
									<span id="nombre" class="form-control"> <?php echo $usuario["contrasena"];?> </span>
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Calle</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["calle"];?> </span>
								</div>	
								<div class="col-sm-3 form-group">
									<label>Numero</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["numero"];?> </span>
								</div>	
								<div class="col-sm-3 form-group">
									<label>Piso</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["piso"];?> </span>
								</div>		
								<div class="col-sm-3 form-group">
									<label>Departamento</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["departamento"];?> </span>
								</div>		
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label>Pais</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["pais"];?> </span>
								</div>	
								<div class="col-sm-3 form-group">
									<label>Provincia</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["provincia"];?> </span>
								</div>	
								<div class="col-sm-3 form-group">
									<label>Ciudad</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["ciudad"];?> </span>
								</div>		
								<div class="col-sm-3 form-group">
									<label>Codigo postal</label>
									<span id="nombre" class="form-control"> <?php echo $usuario_ubicacion["codigo_postal"];?> </span>
								</div>		
							</div>					
							<div class="row">					
								<div class="col-sm-6 form-group">
									<label>Telefono</label>
									<span id="nombre" class="form-control"> <?php echo $usuario["telefono"];?> </span>
								</div>	
								<div class="col-sm-6 form-group">
									<label>Email</label>
									<span id="nombre" class="form-control"> <?php echo $usuario["email"];?> </span>
								</div>	
							</div>
						<br></br>
						<div align="center">
							<button type="submit" class="btn btn-primary navbar-btn">Modificar</button>
							<a type="submit" class="btn btn-danger navbar-btn" href= user_delete.php onclick="return confirm('Esta seguro que desea eliminar su cuenta de forma permanente?')"')">Eliminar Cuenta</a>
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