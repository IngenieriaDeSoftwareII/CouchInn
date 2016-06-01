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
		  				<li class="navbar-left"><a href="index.php"><img src="Logo.png" width="150" height="30"></a></li>
			      		<li><a href="about_us.php">Acerca de...</a></li>
			        	<li><a href="#">Publicar propiedad</a></li>
			      		<form class="navbar-form navbar-left" role="search">
			       		<div class="form-group">
			          		<input type="text" class="form-control" placeholder="Buscar propiedad">
			        	</div>
			        	<button type="submit" class="btn btn-default">Buscar</button>
			      		</form>
			      	</ul>
			    	<ul class="nav navbar-nav navbar-right">
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Mi Perfil <span class="caret"></span>
							</button>
			          		<ul class="dropdown-menu">
			            		<li><a href="user_data_list.php">Mis datos personales</a></li>
			            		<li><a href="#">Mis propiedades</a></li>
			            		<li><a href="#">Mis reservas</a></li>
			            		<li><a href="#">Mis preguntas</a></li>
			            		<?php
			    				if ($_SESSION['rol'] == 1){
								echo '<li role="separator" class="divider"></li>
			            		<li><a href="#">Hazte premium!</a></li>';
			            		}	
			            		?>
			          		</ul>
			          	</div>
						<button type="button" class="btn btn-danger navbar-btn" onClick="window.location.href='session_close.php'">Cerrar Sesion</button>
			    	</ul>
			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</body>
</html>