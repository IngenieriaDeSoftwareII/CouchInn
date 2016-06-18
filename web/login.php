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

  <script type="text/javascript">
    function login_validation(){
    var nombre_usuario = document.getElementById("nombre_usuario").value;
    var contrasena = document.getElementById("contrasena").value;
    if (nombre_usuario == ''){
      alert("Por favor ingrese el nombre.");
      return false;
    }
    if (contrasena == ''){
      alert("Por favor ingrese la descripcion.");
      return false;
    }
  }
  </script>
  </head>
  <body>
    <?php
    if (isset ($_SESSION['rol'])){
      header("Location: index.php");
    }
    else{
      include 'guest_taskbar.php';
    }
    ?>

    <nav>
      <div align="center">
        <a href="index.php"> <img src="images/Logo2.png" width="600" height="125"> </a>
        <h3>Bienvenido a Couch Inn</h3> 
      </div>
    </nav>
    <div class="container" style="margin-top:30px">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading"><h3 class="panel-title"><strong>Iniciar Sesion </strong></h3>
          </div>
  
          <div class="panel-body">
            <form role="form" method="post" action="login_check.php" onsubmit="return login_validation()">
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
                <div style="font-size:85%"> Aun no tienes cuenta?
                  <a href="#" onClick="window.location.href='register.php'"> Registrate ya!</a>
                </div>
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