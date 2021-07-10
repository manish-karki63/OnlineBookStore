<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/button.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='css/register.css' type='text/css'/>
		<script type="text/javascript" src="javascript/register.js"></script>
	</head>
	<body>
		<div class="inner-header-wrapper" style="">
			<div class="logo">
				<a href="#"><img src="assets/img/logo.png" alt="logo"/></a>
			</div>
			<div class="inner-header">
				<div class="title">
					<a href="">Online Book Store</a>
				</div>
				<div class="nav-menu">
					<ol>
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">Cart</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="">Login</a></li>
					</ol>
				</div>
			</div>
		</div>
		
		<!--Sign Up Form-->
		<div class="signup-form">
			<div class="signup-form-wrapper">
				<h3>Enter Your Details</h3>
				<form action='' method='post' enctype='' onsubmit="return validate(this);">
					<div class='input-group'>
						<label>Name</label>
						<input type='text' name='name' placeholder="Your Name Here"/>
						<span class="namemsg" style="color: red;"></span>
					</div>
					<div class='input-group'>
						<label>Contact</label>
						<input type='text' name='roll' placeholder="Your Roll Here"/>
						<span class="roll-msg" style="color: red;"></span>
					</div>
					<div class='input-group'>
						<label>Address</label>
						<input type='text' name='phone' placeholder="Your Phone Number Here"/>
						<span class="phone-msg" style="color: red;"></span>
					</div>
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
						<label> Confirm Password</label> 
						<input type='password' name='cpassword' placeholder="Your Password Here"/>
						<span class="cpassword-msg" style="color: red;"></span>
					</div>
					<div class="button">
						<input type="submit" name="signup" value="Sign up"/>
					</div>
				</form>
			</div><!--signup-form-wrapper-->
		</div><!--signup-form-->
		
		<!-- Footer Section -->
        <?php 
			include 'footer.php';
		?>
	</body>
</html>