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

	    <nav>
		    <div align="center">
		        <a href="index.php"> <img src="Logo2.png" width="600" height="125"> </a>
		        <h3>Bienvenido a Couch Inn</h3> 
		    </div>
	    </nav>
	    <div class="container">
	    	<h1 class="well">Registrarse</h1>
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
									<input type="text" maxlength="100" name="apellido" placeholder="Ingresa tu apellido aqui.." class="form-control">
								</div>
								<div class="col-sm-4 form-group">
									<label>DNI</label>
									<input type="text" maxlength="8" name="dni" placeholder="Ingresa tu DNI aqui.." class="form-control">
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