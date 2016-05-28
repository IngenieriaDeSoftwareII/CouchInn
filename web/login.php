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
    <!--        <ul class="nav navbar-nav navbar-right">
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
    <div class="container" style="margin-top:30px">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading"><h3 class="panel-title"><strong>Iniciar Sesion </strong></h3>
          </div>
  
          <div class="panel-body">
            <form role="form" method="post" action="checklogin.php">
<!--    <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>Usuario o contraseña incorrecta!
            </div> -->
              <div style="margin-bottom: 12px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Usuario">
              </div> 
              <div style="margin-bottom: 12px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
              </div>
              <div style="float:left; font-size: 90%; position: relative; top:-10px">
                <a href="???aca iria la direccion para recuperar contraseña">Olvidaste tu contraseña?</a>
              </div>
              <br> </br>
              <div align="center"> 
                <button type="submit" class="btn btn-success">Iniciar Sesion</button> 
              </div>
              <hr style="margin-top:10px;margin-bottom:10px;" >
              <div class="form-group">
<!--                 <div style="font-size:85%"> Aun no tienes cuenta?
                  <a href="#" onClick="window.location.href='registro.php'"> Registrate ya!</a>
                </div> -->
              </div> 
            </form>
          </div>
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