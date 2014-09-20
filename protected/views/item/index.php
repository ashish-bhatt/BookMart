<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Item</title>
        <meta name="description" content="BookMart's">
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

		<div id="itemdesc">
			<div class="box">
				<div id="itemwrapper">
					<div id="itemhorizontal">
						<div id="left">
							<div id="img">
								<img src="<?php echo $baseUrl.'/img/'.$id.'.png'?>"/>
							</div>
						</div>
						<div id="right">
							<h1><?php echo $bookname ?></h1>
							<div id="description">
								<h3>Description:</h3>
								<p>
							</div>
							<form action="addToCart" method="POST">
								<div id="addtocart">
									<?php 
									if($additem)
										echo CHtml::submitButton('Add to Cart', array('submit'));
									else 
										echo 'Item is present in your cart!'
									?>
								</div>
							</form>
						</div>
					</div>
					<div id="itemvertical">
						<div id="ratings">
							<h3>Rating: 4.0/5.0</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="hslider" class="sliderhorizontal">
            	<?php include(Yii::getPathOfAlias('application.views.common.horizontal_scroll').'.php'); ?>        
        </div>
        
        <div id="message">
            <div class="box">
                <p>Our Books</p>
            </div>
        </div>
        
        <div class="details-heading">
            <?php include(Yii::getPathOfAlias('application.views.common.lower_section').'.php'); ?>
        </div>
    </div>
    
    <footer style="position: relative">
        <div class="box">
            All rights reserved.
        </div>
    </footer>
</div>
</body>
</html>