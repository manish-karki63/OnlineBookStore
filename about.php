<!DOCTYPE html>
	<head>
		<title>About us</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel='stylesheet' href='css/about.css' type='text/css'/>
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<script type="text/javascript">
			function validate(form){
				var a = true;
				
				
				/*Checking Name*/
				var name = form.uname.value;
				var username = /^[a-zA-Z ]+$/;
				if(name==''||name.length==0)
				{
					a = false;
					form.getElementsByClassName('namemsg')[0].innerHTML = "Name should not be blank";
				}
				else{
					if(!name.match(username))
					{
						a = false;
						form.getElementsByClassName('namemsg')[0].innerHTML = "Name should have only alphabet and space";
					}
				}
				
				/*Checking Address*/
				var ad = form.address.value;
				if(ad==""||ad.length==0)
				{
					a = false;
					form.getElementsByClassName('address-msg')[0].innerHTML = "Address should not be blank";
				}
				
				/*Checking Phone Number*/
				var ph = form.phone.value;
				var pho = /^[0-9]+$/;
				if(ph.length!=10)
				{
					a = false;
					form.getElementsByClassName('phone-msg')[0].innerHTML = "Please Enter 10 digit number";
				}
				else{
					if(!ph.match(pho))
					{
						a = false;
						form.getElementsByClassName('phone-msg')[0].innerHTML = "Invalid format Please re-enter number";
					}
				}
				
				/*Checking Email*/
				var em = form.email.value;
				var ema = /^[a-zA-Z](0-9|.|a-zA-Z|_)+$/;
				var atpos = em.lastIndexOf('@');
				var dotpos = em.lastIndexOf('.');
				console.log(atpos);
				console.log(dotpos);
				if(!em.match(ema))
				{
					a = false;
					form.getElementsByClassName('email-msg')[0].innerHTML = "Invalid Format";
				}
				else if(atpos < 1 || (dotpos-atpos) < 2){
					a = false;
					form.getElementsByClassName('email-msg')[0].innerHTML = "Invalid Format";
				}
				return a;
			}
		</script>
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
						<li><a href="login.php">Login</a></li>
					</ol>
				</div>
			</div>
		</div>

		<!-- Contact info section -->

		<div class="contact-info-section">
			<div class="container">
				<h2>About us</h2>
				<p>This is Online Book Store system for easier management of books for selling and record keeping.</p>
				<h2>Contact Info</h2>
				<ul class="contact-info">
					<li><span>Name:</span> Online Book Store</li>
					<li><span >Mobile:</span> +977-1-4479939</li>
					<li><span>Address:</span> Old Baneshwor</li>
					<li><span >Website:</span> kcmit.edu.np</li>
				</ul>
				
			</div><!--/container-->
		</div><!--/contact-info-->

		<div class="contact-form">
			<div class="contact-form-wrapper">
				<h2>Contact-Form</h2>
				<form action="" method="post" onsubmit="return validate(this);">
					<div class="input-group">
						<label>Name</label>
						<input type="text" name="uname" placeholder="Your Name Here"/>
						<span class="namemsg" style="color: red;"></span>
					</div>
					<div class="input-group">	
						<label>Address</label>
						<input type="text" name="address" placeholder="Your Address Here"/>
						<span class="address-msg" style="color: red;"></span>
					</div>
					<div class="input-group">			
						<label>Phone</label>
						<input type="text" name="phone" placeholder="Your Phone Here"/>
						<span class="phone-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Email</label>
						<input type="text" name="email" placeholder="Your Email Here"/>
						<span class="email-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Message</label>
						<textarea placeholder="Your message"></textarea>
					</div>
					<button>Send</button>
				</form>
			</div><!--/contact-form-wrapper-->
		</div><!--/contact-form-->
		<?php 
			include 'footer.php';
		?>
	</body>
</html>