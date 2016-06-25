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
                    include 'user_taskbar.php';
                }
                else{
                    header("Location: index.php");
                }
            }
            else{
                header("Location: index.php");
            }
            include 'conexion.php';
        ?>

        <div class="container"> 
            <?php
            $id_pregunta = $_POST['ver_respuesta'];
            $preg = mysql_query("SELECT * FROM pregunta WHERE id_pregunta = $id_pregunta");
            $table = mysql_fetch_array($preg);
            ?>
                <div class="col-sm-12 form-group">
                    <label>Respuesta:</label>
                    <textarea readonly type="long-text" maxlength="800" name="descripcion" id="descripcion" rows="4" class="form-control"> <?php echo $table["respuesta"];?> </textarea>
                </div>
                <div align="center">
                    <button type="reset" class="btn btn-primary navbar-btn" onClick="window.location.href='javascript:history.back(-1);'">Volver</button>
                </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>