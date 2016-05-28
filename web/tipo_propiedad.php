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
    	<nav class="navbar navbar-default">
			<div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>
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
			    </div>
			</div>
		</nav>
	    <nav>
		    <div align="center">
		        <a href="index.php"> <img src="Logo2.png" width="600" height="125"> </a>
		        <h3>Bienvenido a Couch Inn</h3> 
		    </div>
	    </nav>
	    <div class="container">
	    	<h1 class="well">Registrar un nuevo tipo de propiedad</h1>
			<div class="col-lg-12 well">
				<div class="row">
					<form name="form2" method="post" action="checktipo_propiedad.php">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Nombre</label>
									<input type="text" maxlength="100" name="nombre" placeholder="Ingresa el nombre aqui.." class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Descripción</label>
									<textarea type="long-text" maxlength="800" name="descripcion" rows="6" placeholder="Ingresa la descripción aqui.." class="form-control"></textarea>
								</div>				
							</div>
						<br></br>
						<div align="center">
						<button type="submit" class="btn btn-primary navbar-btn">Agregar</button>	
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