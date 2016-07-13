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
	 
	    <!-- CSS de Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="css/w3.css">
	</head>
	<body>
		<?php
			include 'taskbar_manager.php';
		?>

		<div class="container">
	    	<h1 class="well">Bienvenido a CouchInn</h1>
	    </div>

	    <div class="container">
	    	<h1 class="well">
	    		<p class="lead"> Lamentablemente nuestro sitio requiere que una sesion sea iniciada antes de poder publicar una propiedad. En el caso de que ya poseas un usuario aqui, por favor inicia sesion. Si aun no eres parte de esta comunidad te invitamos a registrarte y conocerno. Saludos, viajero! </p>
			</h1>
	    </div>
	<br></br>

	<div align="center">
		<button type="button" class="btn btn-primary navbar-btn" onClick="window.location.href='register.php'">Registrarme</button>
		<button type="button" class="btn btn-success navbar-btn" onClick="window.location.href='login.php'">Iniciar Sesion</button>
	</div>

	<br></br>


 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>