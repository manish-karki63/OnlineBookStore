<!DOCTYPE html>
	<head>
		<title>Cart</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="css/cart.css">
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		
	</head>
	<body>
		<!--Header Section-->
		<?php
			include('header.php');
		?>

		<!--Cart Section-->
		<div class="cart-info-wrapper">
			<div class="cart-info-section">
				<div class="cart-img">
					<div class="image">
						<img src="assets/img/1604631960_python_book.JPG" alt="img"/>
					</div>
				</div>
				<div class="cart-detail">
					<ul class="book-info">
						<li><span>Book: </span> Core Java Volume I – Fundamentals</li>
						<li><span>Author:</span>Cay S. Horstmann</li>
						<li><span>Price:</span>2500</li>
					</ul>
				</div>
			</div>
			<div class="totalAmount">
				<h2>Total amount</h2>
			</div>
		</div>


		<!--Footer Section-->
		<?php 
			include 'footer.php';
		?>
	</body>
</html>