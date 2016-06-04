<!DOCTYPE html>
<html>
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
		  				<li class="navbar-left"><a href="index.php"><img src="images/Logo.png" width="150" height="30"></a></li>
			      		<li><a href="about_us.php">Acerca de...</a></li>
			        	<li><a href="property_publish_without_login.php">Publicar propiedad</a></li>
			      		<form class="navbar-form navbar-left" role="search">
			       		<div class="form-group">
			          		<input type="text" class="form-control" placeholder="Buscar propiedad">
			        	</div>
			        	<button type="submit" class="btn btn-default">Buscar</button>
			      		</form>
			      	</ul>
			    	<ul class="nav navbar-nav navbar-right">
						<button type="button" class="btn btn-primary navbar-btn" onClick="window.location.href='register.php'">Registrarme</button>
						<button type="button" class="btn btn-success navbar-btn" onClick="window.location.href='login.php'">Iniciar Sesion</button>
			    	</ul>
			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</body>
</html>