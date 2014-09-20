
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Register/Login</title>
        <meta name="description" content="BookMart's static web page">
        <meta name="author" content="Ashish">
        <?php include(Yii::getPathOfAlias('application.views.common.resources').'.php'); ?>
        <script type="text/javascript">
        /*$(document).ready(function(){
            var callAjax = function(){
              $.ajax({
            	  	url: '../Payments/CheckPayment', 
                datatype: 'json',
                success:function(data){
                	<?php //if(Yii::app()->session['paymentdone'] == true)
               			//$this->redirect('home/index'); ?>
                }
              });
            }
            setInterval(callAjax,20000);
          });*/
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
				<h2><?php if(isset($msg)) echo $msg;?></h2>
				<h2 style="align:center;">Just one step away</h2>
				<form action="ProceedToPayments" method="POST">
					<div id="itemwrapper">
						<label>Select your card type:</label>
						<select id="card" name="card">
							<option value="CC">Credit Card</option>
							<option value="DC">Debit Card</option>
						</select>
						<br><br>
						<label>Select your card provider:</label>
						<select id="provider" name="provider">
							<option value="visa">VISA</option>
							<option value="amex">AMEX</option>
							<option value="jcb">JCB</option>
							<option value="maestro">MAESTRO</option>
							<option value="solo">SOLO</option>
							<option value="mastercard">MASTERCARD</option>
							<option value="switch">SWITCH</option>
						</select>
						<br><br>
						<label>Card No:</label>
						<input id="cardno" name="cardno" style="width:300px;" type="text" Placeholder="Card No" />
						<br><br>
						<input type="submit" value="Pay" id="submit"/>
					</div>
				</form>
			</div>
		</div>
        
        <div class="details-heading" style="left:0px; bottom:0px; position:absolute;width:100%">
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