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
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  	</head>
	<body>
		<?php
		include 'taskbar_manager.php';
		?>
		
		<nav>
		        <h2><font face="Arial" size=5 color=grey><b>Un viaje de mil millas comienza con un solo paso...</b></font></h2> 
	    </nav>
	    <br></br>
		<div class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  	<ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  	</ol>

			  <!-- Wrapper for slides -->
			  	<div class="carousel-inner" role="listbox" align="center">
			   		<div class="item active">
			      		<img src="house1.jpg" width="720" height="360">
			     		<div class="carousel-caption">
			     			<h3><font face="calibri" size=5><b>Prados Escoceses</b></font></h3>
			    		</div>
			  		</div>
				    <div class="item">
				      	<img src="house2.jpg" width="720" height="360">
				      	<div class="carousel-caption">
				      		<h3><font face="calibri" size=5><b>Lagos Nordicos</b></font></h3>
				     	</div>
				    </div>
				    <div class="item">
				      	<img src="house3.jpg" width="720" height="360">
				      	<div class="carousel-caption">
				      		<h3><font face="calibri" size=5><b>Playas de Bora Bora</b></font></h3>
				     	</div>
				    </div>
			  	</div>

			  <!-- Controls -->
			  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			   		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
			</div>
		</div>
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