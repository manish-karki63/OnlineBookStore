<?php
	include('database/login_db.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/button.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='css/login.css' type='text/css'/>
	</head>
	<body>
		<?php
			include('header.php');
		?>
		
		<!--Login Form-->
		<div class="login-form">
			<div class="login-form-wrapper">
				<h3>Enter Your Email and Password</h3>
				<form action='' method='post' enctype=''>
					<?php if($message){?>
					<div><?php echo $message;?></div><?php } ?>
					<div class="input-group">
						<label>Email</label>
						<input type='email' name='email' placeholder="Your Email Here"/>
						<span class="email-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Password</label> 
						<input type='password' name='password' placeholder="Your Password Here"/>
						<span class="password-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<a href="register.php" style="text-decoration: none; text-transform: capitalize;">Create a new account</a>
					</div>
					<div class="button">
						<input type="submit" name="login" value="Login"/>
					</div>
				</form>
			</div><!--login-form-wrapper-->
		</div><!--login-form-->
		
		<?php 
			include 'footer.php';
		?>
	</body>
</html>