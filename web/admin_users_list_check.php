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
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <?php
        if (isset ($_SESSION['rol'])){
            if (($_SESSION['rol'] == 1) || ($_SESSION['rol'] == 2)){
                header("Location: index.php");
            }
            else{
                include 'admin_taskbar.php';
            }
        }
        else{
            header("Location: index.php");
        }
        
        $con = mysql_connect('localhost', 'root', '') or die ("No se pudo conectar a la BD");
        mysql_select_db("couchInn", $con) or die ("No se pudo conectar a la BD");
        ?>

        <div class="container">
            <h1 class="well">Listado de usuarios registrados entre <?php echo $_POST['fecha1'];?> - <?php echo $_POST['fecha2'];?></h1>
            <form name="form" method="post" action="users_list.php">
                <div class="panel panel-default">
                    <table class="table">
                        <tr>
                            <td><strong>Nombre de Usuario</strong></td>
                            <td><strong>Fecha de Registro</strong></td>
                        </tr>
                        <?php
                        $desde = $_POST['fecha1'];
                        $hasta = $_POST['fecha2'];
                        $desde = str_replace('/', '-', $desde);
                        $hasta = str_replace('/', '-', $hasta);
                        $desde = date('Y-m-d', strtotime($desde));
                        $hasta = date('Y-m-d', strtotime($hasta));
                        $resultado = mysql_query("SELECT * FROM usuario WHERE fecha_registro BETWEEN '$desde' AND '$hasta'");
                        while ($tabla = mysql_fetch_array($resultado)){ 
                            $var = $tabla["id_usuario"];
                            ?>
                            <tr>
                                <td> <?php echo $tabla["nombre_usuario"];?></td>
                                <td> <?php echo $tabla["fecha_registro"];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </form>
            <div align="center">
                <a href="users_list.php"><button type="button" class="btn btn-primary navbar-btn">Listar Todos los Usuarios</button></a>
            </div>
        </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>