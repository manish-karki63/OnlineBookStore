<!DOCTYPE html>
	<head>
		<title>Book Detail</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="css/bookDetail.css">
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		
	</head>
	<body>
		<?php
			include('header.php');
		?>

		<!--Book Detail-->
		<div class="book-info-section">
			<div class="image">
				<img src="assets/img/1604631960_python_book.JPG" alt="img"/>
			</div>
			<div class="book-container">
				<ul class="book-info">
					<li><span>Title:</span> Core Java Volume I – Fundamentals</li>
					<li><span>Author:</span>Cay S. Horstmann</li>
					<li><span>Category:</span>Educational, Programming</li>
					<li><span>Price:</span>2500</li>
					<li><span>Description:</span>
						<p>Core Java Volume I – Fundamentals is a Java reference book (Best book for Java)that offers a detailed explanation of various features of Core Java, including exception handling, interfaces, and lambda expressions. Significant highlights of the book include simple language, conciseness, and detailed examples. The latest edition of the Core Java Volume I – Fundamentals comprehensively updated for covering Java SE 9, 10 & 11. The book helps Java programmers develop an ability to write highly robust and maintainable code.</p>
					</li>
				</ul>
				<div>
					<input type="number" name="num" value="1" />
					<input type="submit" name="submit" value="Add to Cart" style="background: grey; color:white; text-transform:uppercase;
	line-height:1; padding:15px 45px; outline:0; border: 1px solid transparent;	font-weight: 400;
	font-size: 14px; cursor: pointer; border-radius: 25px; border: 2px solid grey; transition: all 0.3s ease;" />
				</div>
			</div>
		</div>



		<!--Footer-->
		<?php 
			include 'footer.php';
		?>
	</body>
</html>