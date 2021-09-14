<?php
	include('../database/adminLoginDb.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel='stylesheet' href='../css/header.css' type='text/css'/>
		<link rel='stylesheet' href='../css/button.css' type='text/css'/>
		<link rel='stylesheet' href='../css/footer.css' type='text/css'/>
		<link rel="stylesheet" href="../css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='../css/login.css' type='text/css'/>
	</head>
	<body>
		<!--Header Section-->
<div class="inner-header-wrapper" style="">
			<div class="logo">
				<a href="#"><img src="../assets/img/logo.png" alt="logo"/></a>
			</div>
			<div class="inner-header">
				<div class="title">
					<a href="">Online Book Store</a>
				</div>
				<div class="nav-menu">
					<ol>
						<li><a></a></li>
					</ol>
				</div>
			</div>
		</div>
		
		<!--Login Form-->
		<div class="login-form">
			<div class="login-form-wrapper">
				<h3>Enter Your Username and Password</h3>
				<form action='' method='post' enctype=''>
					<div class="input-group">
						<label>Username</label>
						<input type='text' name='username' placeholder="Your username Here"/>
						<span class="username-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Password</label> 
						<input type='password' name='password' placeholder="Your Password Here"/>
						<span class="password-msg" style="color: red;"></span>
					</div>
					
					<div class="button">
						<input type="submit" name="login" value="Login"/>
					</div>
				</form>
			</div><!--login-form-wrapper-->
		</div><!--login-form-->
		
		<?php 
			include '../footer.php';
		?>
	</body>
</html>