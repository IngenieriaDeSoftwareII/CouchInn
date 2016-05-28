<?php
/* start the session */
session_start();
// echo "Welcome, " . $_SESSION['username'];
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
		<nav class="navbar navbar-default">
			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
		  			<ul class="nav navbar-nav">
		  				<li class="navbar-left"><a href="index.php"><img src="Logo.png" width="150" height="30"></a></li>
			      		<li><a href="acerca_de.php">Acerca de...</a></li>
			        	<li><a href="#">Publicar propiedad</a></li>
			      		<form class="navbar-form navbar-left" role="search">
			       		<div class="form-group">
			          		<input type="text" class="form-control" placeholder="Buscar propiedad">
			        	</div>
			        	<button type="submit" class="btn btn-default">Buscar</button>
			      		</form>
			      	</ul>
			    	<ul class="nav navbar-nav navbar-right">
						<button type="button" class="btn btn-primary navbar-btn" onClick="window.location.href='registro.php'">Registrarme</button>
						<button type="button" class="btn btn-success navbar-btn" onClick="window.location.href='login.php'">Iniciar Sesion</button>
			    	</ul>
		<!--  	    <ul class="nav navbar-nav navbar-right">
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi Perfil<span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Mis datos personales</a></li>
			            <li><a href="#">Mis propiedades</a></li>
			            <li><a href="#">Mis reservas</a></li>
			            <li><a href="#">Mis preguntas</a></li>
			          </ul>
			        </li>
			     </ul> -->
			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

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