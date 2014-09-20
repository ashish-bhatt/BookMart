<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Payment</title>
<meta name="description" content="BookMart's">
<meta name="author" content="Ashish">
		<?php include(Yii::getPathOfAlias('application.views.common.resources').'.php'); ?>
		<script type="text/javascript">
		$(document).ready( function() {
		$("#username").keyup(function (e) { //user types username on inputfiled
			   var username = $(this).val(); //get the string typed by user
			   if(username.length == 0)
				   $("#user-result").html("");
			   else
			   {
				   $.post('../Login/SearchUsername', {'username':username}, function(data) { //make ajax call to check_username.php
					   if(data == "true")
						   $("#user-result").html('User already exists.');
					   else if(data == "false")
						   $("#user-result").html('Username is available');
			   });
			   }
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

			<div class="box">
	    		<?php if ( Yii::app()->session['login'] >= 2 && Yii::app()->session['login'] <=4){ ?>
		    		<div id="login-msg">
					<h3>
				    		<?php
								if (Yii::app ()->session ['login'] == 2) {
									echo 'Registration was successful! Now login to use more features of BookMart.';
								} else if (Yii::app ()->session ['login'] == 3) {
									echo 'Registration was unsuccessful. Username already exists, please try again with different username';
								} else if(Yii::app ()->session ['login'] == 4){
									echo 'Login Denied. Either your username and/or your password are wrong.';
								}
								Yii::app ()->session ['login'] = 0;
						?>
					</h3>
				</div>
	    		<?php } ?>
	    		
	    		<div id="form-container">
					<div id="signup">
						<h1>Register</h1>
						<form action="Register" method="POST" id="signup">
							<p>
								<label>User Name</label> <input id="username" type="text"
									name="username" placeholder="username" />
									<span id="user-result"></span>
							</p>
							<p>
								<label>Password&nbsp;&nbsp;</label> <input id="password"
									type="password" name="password" placeholder="password" />
							</p>
							<p>
								<label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<input id="email" type="email" name="email" />
							</p>
							<p>
								<input type="submit" name="submit" value="Register" />
							</p>
							<p>Already have an account? Login</p>
						</form>
					</div>
					<div id="login">
						<h1 style="margin-left: 100px;">Login</h1>
						<form action="Login" method="POST" id="login">
							<p>
								<label>User Name</label> <input id="username" type="text"
									name="username" placeholder="username" />
							</p>
							<p>
								<label>Password&nbsp;&nbsp;</label> <input id="password"
									type="password" name="password" placeholder="password" />
							</p>
							<p>
								<input type="submit" name="submit-login" value="Login" />
							</p>
						</form>
					</div>
				</div>
			</div>

			<script>
			    var frmvalidatorsignup = new Validator("signup");
			    var frmvalidatorlogin = new Validator("login");
			    frmvalidatorsignup.addValidation("username","req","Username can't be empty.");
			    frmvalidatorsignup.addValidation("username","maxlen=50","Username can't exceed 50 characters.");
				
			    frmvalidatorsignup.addValidation("password","req","password can't be empty.");
			    frmvalidatorsignup.addValidation("password","maxlen=10","password can't exceed 10 characters.");
				
			    frmvalidatorsignup.addValidation("email","maxlen=50","Email can't exceed 50 characters.");
			    frmvalidatorsignup.addValidation("email","req","Email can't be empty.");
			    frmvalidatorsignup.addValidation("email","email","Not a valid Email.");
			    
			    frmvalidatorlogin.addValidation("username","req","Username can't be empty.");
			    frmvalidatorlogin.addValidation("username","maxlen=50","Username can't exceed 50 characters.");
				
			    frmvalidatorlogin.addValidation("password","req","password can't be empty.");
			    frmvalidatorlogin.addValidation("password","maxlen=10","password can't exceed 10 characters.");
			</script>

			<div class="details-heading">
	            <?php include(Yii::getPathOfAlias('application.views.common.lower_section').'.php'); ?> 
	        </div>
		</div>

		<footer style="position: absolute">
			<div class="box">All rights reserved.</div>
		</footer>
	</div>
</body>
</html>