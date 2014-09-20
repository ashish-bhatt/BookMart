<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Checkout</title>
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
				<?php
					$cart = Yii::app()->session['cart']; 
					if(sizeof($cart) == 0)
						echo '<h1>' . 'No items in your cart.' . '</h1>';
					else 
					{
						echo '<table>';
						foreach($cart as $item)
						{
							echo '<tr>';
								echo '<td>';
	        							echo '<h2>'.$item->prodname.'</h2>';
	        						echo '</td>';
	        						echo '<td>';
	        							echo CHtml::link('Remove item',array('Item/RemoveItem', 'id'=>$item->prodid));
	        						echo '</td>';
							echo '</tr>';
	        				}
						echo '</table>';
						echo CHtml::link('Proceed to Payments',array('Payments/index'));
					}
				?>
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
    
    <footer style="position: absolute">
        <div class="box">
            All rights reserved.
        </div>
    </footer>
</div>
</body>
</html>