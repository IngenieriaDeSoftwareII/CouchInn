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
        <script type="text/javascript">
			function pregunta_validation(){
				var preg = document.getElementById("preg").value;
				if (preg == ''){
					alert("Por favor ingrese la pregunta.");
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
			// $id_propiedad = $_POST['preg'];
			$id_propiedad = $_GET["preg"];
			// $preg = mysql_query("SELECT * FROM pregunta WHERE id_pregunta = $id_pregunta");
			// $table = mysql_fetch_array($preg);
			// $id_propiedad = $table["id_propiedad"];
			$preg3 = mysql_query("SELECT * FROM propiedad WHERE id_propiedad = $id_propiedad");
			$nombre = mysql_fetch_array($preg3);
			?>
	    	<h1 class="well">Ingrese la pregunta a la propiedad "<?php echo $nombre["nombre"];?>"</h1>
			
<!-- 			<h2 class="col-sm-12 form-group"><?php echo $table["descripcion"];?></h1> -->

				<form name="form1" method="post" action="user_question_check.php" onsubmit="return pregunta_validation()"> 
					<div class="col-sm-12 form-group">
					<label> Pregunta: </label>
						<textarea type="long-text" maxlength="800" name="preg" id="preg" rows="6" value="Ingrese la pregunta aqui ..." class="form-control"></textarea>
					</div>
					<div align="center">
						<button type="submit" class="btn btn-primary navbar-btn" name="propiedad" id="propiedad" value="<?php echo htmlspecialchars($id_propiedad);?>">Aceptar</button>	
						<button type="reset" class="btn btn-default navbar-btn">Restablecer</button>
					</div>
				</form>
				<div align="center">
					<button type="reset" class="btn btn-primary navbar-btn" onClick="window.location.href='javascript:history.back(-1);'">Volver</button>
				</div>
<!-- 				<button type="button" class="btn btn-danger navbar-btn" onClick="window.location.href='property_questions_list.php'">Volver a preguntas de "<?php echo $nombre["nombre"];?>"</button>	 -->
		</div>

    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
  	</body>
</html>