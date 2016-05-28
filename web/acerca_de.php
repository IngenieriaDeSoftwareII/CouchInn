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

		<div class="container">
	    	<h1 class="well">¿Quienes somos?</h1>
	    </div>

	    <div class="container">
	    	<h1 class="well">
	    		<p class="lead"> Couch Inn es un sitio web que nace con una premisa simple y concisa: conectar a viajeros que buscan convivir con nativos del lugar al que se dirigen, con personas que desean ofrecer un espacio para alojar visitantes. Como fundadores de este espacio de vinculación, pero en primer lugar como amantes de los intercambios culturales, el proyecto de montar este sitio surgió (como no podía ser de otra forma) luego de poner en común ciertas reflexiones a partir de nuestra extensa experiencia como viajeros. A la hora de emprender cada uno de nuestros viajes, el principal debate solía ser bajo que techo acomodarse a la hora de descansar. El precio de los hoteles o apartamentos muchas veces resultaba inaccesible, cargar la carpa no siempre era posible, y en muchos lugares las inclemencias del tiempo no permitían sencillamente dormir bajo un árbol mirando las estrellas. Lo recurrente de esta problemática nos llevó a incursionar en otro tipo de sistema, y así fue que descubrimos que la posibilidad de hospedarse en el hogar de un nativo dispuesto a brindar un lugar, no sólo era un alivio para el bolsillo, sino que también permitía conocer cada cultura desde un punto de vista diferente y particular: desde adentro. Partiendo de los inmensos Himalayas hasta desembocar en las pequeñas calles de Siena, desde el vasto y desierto campo de algodón en Texas hasta la poblada rambla de Barcelona, del orden y quietud de las noches de domingo en Sidney hasta el fervor de los lunes por la mañana en Ciudad del Cabo, siempre hallamos un sillón y un anfitrión dispuestos a recibirnos con un abrazo y una historia. La necesidad de divulgar ésta poco convencional metodología, y de acercar a más gente a conocerse y compartir desembocó en este desafiante proyecto que hoy presentamos a ustedes.</p>
			</h1>
	    </div>
	<br></br>

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