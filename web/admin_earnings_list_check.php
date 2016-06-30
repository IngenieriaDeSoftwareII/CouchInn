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
        <link rel="stylesheet" href="css/w3.css">
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
            <h1 class="well">Listado de ganancias entre <?php echo $_POST['fecha1'];?> - <?php echo $_POST['fecha2'];?></h1>
            <form name="form" method="post" action="user_premium_manager.php">
                <div class="panel panel-default">
                    <table class="table">
                        <tr>
                            <td align="center"><strong>Nombre de Usuario</strong></td>
                            <td align="center"><strong>Nombre Propiedad</strong></td>
                            <td align="center"><strong>Cantidad Dias</strong></td>
                            <td align="center"><strong>Monto por Dia</strong></td>
                            <td align="center"><strong>Monto Total</strong></td>
                        </tr>
                        <?php
                        $totales = 0;
                        $desde = $_POST['fecha1'];
                        $hasta = $_POST['fecha2'];
                        $desde = str_replace('/', '-', $desde);
                        $hasta = str_replace('/', '-', $hasta);
                        $desde = date('Y-m-d', strtotime($desde));
                        $hasta = date('Y-m-d', strtotime($hasta));
                        $total_reservas_aceptadas = mysql_query("SELECT * FROM reserva_propiedad WHERE estado = 2 AND (fecha_inicio_reserva BETWEEN '$desde' AND '$hasta') AND (fecha_fin_reserva BETWEEN '$desde' AND '$hasta')");
                        while ($tabla = mysql_fetch_array($total_reservas_aceptadas)){ 
                            $con_usuario = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$tabla[id_huesped]'");
                            $usuario = mysql_fetch_array($con_usuario);
                            $con_propiedad = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = '$tabla[id_propiedad]'");
                            $propiedad = mysql_fetch_array($con_propiedad);
                            $fec_inicio = (strtotime($tabla["fecha_inicio_reserva"]))/86400;
                            $fec_fin = (strtotime($tabla["fecha_fin_reserva"]))/86400;
                            $cant = $fec_fin - $fec_inicio;
                            $total = $propiedad["precio"];
                            $total = $total * $cant;
                            ?>
                            <tr>
                                <td align="center"> <?php echo $usuario["nombre_usuario"];?></td>
                                <td align="center"> <?php echo $propiedad["nombre"];?></td>
                                <td align="center"> <?php echo $cant;?></td>
                                <td align="center"> <?php echo $propiedad["precio"];?></td>
                                <td align="center"> <?php echo $total;?></td>
                            </tr>
                        <?php
                        $totales = $totales + $total;
                        }
                        $totales = $totales * 0.05;
                        ?>
                      </table>
                </div>
            </form>
            <div class="container">
            <h1 class="well">Ganancias Totales: $<?php echo $totales;?></h1>
            <div align="center">
                <a href="admin_earnings_list.php"><button type="button" class="btn btn-primary navbar-btn">Listar todas las Ganancias</button></a>
            </div>
        </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>