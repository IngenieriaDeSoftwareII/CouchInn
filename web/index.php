<?php
/* start the session */
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
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  	</head>
	<body>
		<?php
		if (isset ($_SESSION['rol'])){
			if ($_SESSION['rol'] == 0){
				include 'user_taskbar.php';
			}
			else{
				include 'admin_taskbar.php';
			}
		}
		else{
			include 'guest_taskbar.php';
		}
		?>

		<footer>
		    <ul class="site-footer-links">
		      	<li>&copy; 2016 <span title="0.02827s from github-fe150-cp1-prd.iad.github.net">Couch Inn</span>, Inc.</li>
		    </ul>
		</footer>

		 
		    <!-- Librería jQuery requerida por los plugins de JavaScript -->
		<script src="js/jquery.js"></script>
		 
		    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
		         incluir archivos JavaScript individuales de los únicos
		         plugins que utilices) -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>