<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BookMart</title>
<meta name="description" content="BookMart' Online Store">
<meta name="author" content="Ashish">
		<?php include(Yii::getPathOfAlias('application.views.common.resources').'.php'); ?>
    		<script>
	        jQuery(document).ready(function($) {
	            $("#hslider").FlowSlider({
	                infinite: false,
	                animation: "Accelerating",
	                controllers: ["Drag"],
	                controllerOptions: [{
	                    center: 100,
	                    mouseStart: 300,
	                    mouseEnd: 100
	                }]
	            }); 
	        });
    		</script>
</head>
<body>
	<div id="wrapper">

		<div id="header">
    			<?php include(Yii::getPathOfAlias('application.views.common.header').'.php'); ?>
    		</div>

		<div id="primary-navigation">
          	<?php include(Yii::getPathOfAlias('application.views.common.navigation').'.php'); ?>  
    		</div>

		<div id="space"></div>

		<div id="primary-content">
			<div id="image">
				<div class="box">
					<img src="<?php echo $baseUrl.'/img/sale.jpeg'?>">
				</div>
			</div>

			<div id="sliderFrame">
	        		<?php include(Yii::getPathOfAlias('application.views.common.slider').'.php'); ?>
	         </div>

			<div id="hslider" class="sliderhorizontal">
	  			<?php include(Yii::getPathOfAlias('application.views.common.horizontal_scroll').'.php'); ?> 
	        </div>

			<div id="message">
				<div class="box">
					<p>OUR BOOKS</p>
				</div>
			</div>

			<div class="details-heading">
	            <?php include(Yii::getPathOfAlias('application.views.common.lower_section').'.php'); ?> 
	        </div>

		</div>

		<footer>
			<div class="box">All rights reserved.</div>
		</footer>

	</div>
</body>
</html>