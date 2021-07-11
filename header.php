<!--Header Section-->
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
						<li><?php 
								if(isset($_SESSION['name'])){
									echo "<a>".$_SESSION['name']." </a>";
								}else{
									echo "<a href='login.php'>Login</a>";
								}
								
							?></li>
					</ol>
				</div>
			</div>
		</div>