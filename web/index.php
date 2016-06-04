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
 
  	</head>
	<body>
		<?php
		include 'taskbar_manager.php';
		?>
		
		<nav>
		        <h2><font face="Arial" size=5 color=grey><b>Un viaje de mil millas comienza con un solo paso...</b></font></h2> 
	    </nav>
	    <br></br>

<!-- 		<div class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  	<ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  	</ol>

			  	<div class="carousel-inner" role="listbox" align="center">
			   		<div class="item active">
			      		<img src="house1.jpg" width="720" height="360">
			     		<div class="carousel-caption">
			     			<h3><font face="calibri" size=5><b>Prados Escoceses</b></font></h3>
			    		</div>
			  		</div>
				    <div class="item">
				      	<img src="house2.jpg" width="720" height="360">
				      	<div class="carousel-caption">
				      		<h3><font face="calibri" size=5><b>Lagos Nordicos</b></font></h3>
				     	</div>
				    </div>
				    <div class="item">
				      	<img src="house3.jpg" width="720" height="360">
				      	<div class="carousel-caption">
				      		<h3><font face="calibri" size=5><b>Playas de Bora Bora</b></font></h3>
				     	</div>
				    </div>
			  	</div>

			  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			   		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
			</div>
		</div> -->

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
    								<button type="submit" name="id_foto" id="id_foto" value="<?php echo htmlspecialchars($id);?>"><img src="<?php echo $foto['url'];?>" style="width:1024px;height:560px;" alt="Imagen">
<!--     							<div class="uk-overlay-panel uk-overlay-background uk-overlay-right uk-overlay-slide-right uk-width-1-4">
                                	<h3>Overlay Right</h3>
                                    <p>Lorem <a href="#">ipsum dolor</a> sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
                                    <button class="uk-button uk-button-primary">Button</button>
                                </div> -->
                            </form>
    						</li>
		                <?php
		                }
		                ?>
		            </ul>
		            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="width:160px;height:560px;"></a>
		            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="width:160px;height:560px; "></a>
<!-- 		            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
		                <li data-uk-slideshow-item="0"><a href="#">Item 1</a></li>
		                <li data-uk-slideshow-item="1"><a href="#">Item 2</a></li>
		                <li data-uk-slideshow-item="2"><a href="#">Item 3</a></li>
		            </ul> -->
		        </div>
	    	</div>
    	</div>


		<footer>
		    <ul class="site-footer-links">
		      	<li>&copy; 2016 <span title="0.02827s from github-fe150-cp1-prd.iad.github.net">Couch Inn</span>, Inc.</li>
		    </ul>
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