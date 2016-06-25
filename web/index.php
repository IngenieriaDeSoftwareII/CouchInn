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
		<style>
			.mySlides {display:none}
			.w3-left, .w3-right, .w3-badge {cursor:pointer}
			.w3-badge {height:13px;width:13px;padding:0}
		</style>
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

		<div class="w3-content w3-display-container">
		            	<?php
		            	include 'conexion.php';
		            	$result = mysql_query("SELECT * FROM foto");
						while ($foto = mysql_fetch_array($result)){
							$id = $foto["id_foto"];
							$result2 = mysql_query("SELECT * FROM propiedad WHERE (id_propiedad = '$foto[id_propiedad]')");
							$propiedad = mysql_fetch_array($result2);
							$result3 = mysql_query("SELECT * FROM ubicacion WHERE (id_ubicacion = '$propiedad[id_ubicacion]')");
							$propiedad_ubicacion = mysql_fetch_array($result3);
							$id_propiedad = $foto["id_propiedad"];
						?>
							<div class="w3-display-container">
								<a href="property_view.php?id_propiedad=<?php echo htmlspecialchars($id_propiedad);?>"><img src="<?php echo $foto['url'];?>" style="width:1024px;height:560px;" alt="Imagen" class="mySlides"></a>
		                		<div class="w3-display-topright w3-large w3-container w3-padding-16 w3-text-white">
   									<p class="myTextSlides"><?php echo $propiedad_ubicacion['ciudad'];?>, <?php echo $propiedad_ubicacion['provincia'];?>, <?php echo $propiedad_ubicacion['pais'];?></p>
  									<p class="myTextSlides2" align="center">$<?php echo $propiedad['precio'];?> por noche</p>
  								</div>
  							</div>
		                <?php
		                }
		                ?>
		    <a class="w3-btn-floating" style="position:absolute;top:45%;left:0" onclick="plusDivs(-1)">❮</a>
			<a class="w3-btn-floating" style="position:absolute;top:45%;right:0" onclick="plusDivs(1)">❯</a>
			<div class="w3-center w3-section w3-large w3-text-white w3-display-bottomleft" style="width:100%">
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(6)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(7)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(8)"></span>
			    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(9)"></span>
			</div>
    	</div>

		<script>
			var slideIndex = 1;
			showDivs(slideIndex);

			function plusDivs(n) {
			  showDivs(slideIndex += n);
			}

			function currentDiv(n) {
			  showDivs(slideIndex = n);
			}

			function showDivs(n) {
				var i;
				var x = document.getElementsByClassName("mySlides");
				var y = document.getElementsByClassName("myTextSlides");
				var z = document.getElementsByClassName("myTextSlides2");
				var dots = document.getElementsByClassName("demo");
				if (n > x.length) {
				  	slideIndex = 1
				}
				if (n < 1) {
				  	slideIndex = x.length
				}
				for (i = 0; i < x.length; i++) {
				    x[i].style.display = "none";
					y[i].style.display = "none";
				 	z[i].style.display = "none";
				}
				for (i = 0; i < dots.length; i++) {
				   dots[i].className = dots[i].className.replace(" w3-white", "");
				}
				x[slideIndex-1].style.display = "block";
				y[slideIndex-1].style.display = "block";
				z[slideIndex-1].style.display = "block";
				dots[slideIndex-1].className += " w3-white";
			}
		</script>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/uikit.min.js"></script>
		<script src="js/components/slideshow.min.js"></script>
		<script src="js/components/slideshow-fx.min.js"></script>
		<script src="js/components/slideset.min.js"></script>
		<script src="js/components/slider.min.js"></script> 

	</body>
</html>