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
		<link rel="stylesheet" href="css/uikit.min.css">
		<link rel="stylesheet" href="css/components/slideshow.min.css">
		<link rel="stylesheet" href="css/components/slidenav.min.css">
		<link rel="stylesheet" href="css/components/slideshow.almost-flat.min.css">
		<link rel="stylesheet" href="css/components/slideshow.gradient.min.css">
		<link rel="stylesheet" href="css/w3.css">
  	</head>
	<body>
		<?php
		include 'taskbar_manager.php';
		?>
		<br></br>
		<div class="container">
			<nav>
		        <h2><font face="Comic sans MS" size=6 color=grey><b>Un viaje de mil millas comienza con un solo paso...</b></font></h2> 
	    	</nav>
	    </div>
	    <br></br>

		<div class="container">
	       	<div data-uk-slideshow="{kenburns:true}">
		        <div class="uk-slidenav-position" data-uk-slideshow>
		            <ul class="uk-slideshow">
		            	<?php
		            	include 'conexion.php';
		            	$result = mysql_query("SELECT * FROM foto");
						while ($foto = mysql_fetch_array($result)){
							$id = $foto["id_foto"];
						?>
    						<li align='center'>
    							<form name="form1" method="post" action="property_view.php">
    								<button type="submit" name="id_foto" id="id_foto" value="<?php echo htmlspecialchars($id);?>"><img src="<?php echo $foto['url'];?>" style="width:1024px;height:560px;" alt="Imagen"></button>
                            	</form>
    						</li>
		                <?php
		                }
		                ?>
		            </ul>
		            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="width:160px;height:560px;"></a>
		            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="width:160px;height:560px; "></a>
		        </div>
	    	</div>
    	</div>

		<footer>
		    <?php
			// include 'taskbar_manager.php';
			?>
		</footer>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/uikit.min.js"></script>
		<script src="js/components/slideshow.min.js"></script>
		<script src="js/components/slideshow-fx.min.js"></script>
		<script src="js/components/slideset.min.js"></script>
		<script src="js/components/slider.min.js"></script> 

	</body>
</html>