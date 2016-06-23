<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Couch Inn - Reserva tu proximo Hospedaje!</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/w3.css">
        <script type="text/javascript">
			function respuesta_validation(){
				var res = document.getElementById("res").value;
				if (res == ''){
					alert("Por favor ingrese la respuesta.");
					return false;
				}
			}
		</script>
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
			$id_pregunta = $_POST['respond'];
			$preg = mysql_query("SELECT * FROM pregunta WHERE id_pregunta = $id_pregunta");
			$table = mysql_fetch_array($preg);
			$id_propiedad = $table["id_propiedad"];
			$preg3 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = $id_propiedad");
			$nombre = mysql_fetch_array($preg3);
			?>
	    	<h1 class="well">Responder a la pregunta de la propiedad "<?php echo $nombre["nombre"];?>"</h1>
			
<!-- 			<h2 class="col-sm-12 form-group"><?php echo $table["descripcion"];?></h1> -->

				<form name="form1" method="post" action="user_responder_check.php" onsubmit="return respuesta_validation()"> 
					<div class="col-sm-12 form-group">
						<label>Respuesta:</label>
						<textarea type="long-text" maxlength="800" name="res" id="res" rows="6" value="Ingrese la respuesta aqui ..." class="form-control"></textarea>
					</div>
					<div align="center">
						<button type="submit" class="btn btn-primary navbar-btn" name="actualizar" id="actualizar" value="<?php echo htmlspecialchars($id_pregunta);?>">Aceptar</button>	
						<button type="reset" class="btn btn-default navbar-btn">Restablecer</button>
					</div>
				</form>
				<div align="center">
					<a href="user_property_list.php"><button type="button" class="btn btn-success navbar-btn">Volver al listados de Mis Propiedades</button></a>
				</div>
<!-- 				<button type="button" class="btn btn-danger navbar-btn" onClick="window.location.href='property_questions_list.php'">Volver a preguntas de "<?php echo $nombre["nombre"];?>"</button>	 -->
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>