<?php
session_start();
	if(!isset($_SESSION['id'])){
		header('refresh:0,URL=login.php');
	}
	$conn= new mysqli('localhost','root','','book_store_db')or die("Could not connect to mysql".mysqli_error($con));
?>

<!DOCTYPE html>
	<head>
		<title>Cart</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/button.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="css/cart.css"/>
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		
	</head>
	<body>
		<!--Header Section-->
		<?php
			include('header.php');
		?>

		<!--Cart Section-->
		<div class="cart-info-wrapper">
			<div class = "carts">
			<?php
				if($_SESSION['id']!=''){
					$id=$_SESSION['id'];
				}else{
					$id = $_SESSION['id'];
				}
				$tprice = 0;
				$sel_bookid = "select book_id,qty from cart where customer_id=$id";
				$data1 = mysqli_query($conn,$sel_bookid) or die('Selection Error of book id');
				while($arr=mysqli_fetch_assoc($data1)){
					$selectBookId = $arr['book_id'];
					$qty = $arr['qty'];
					$select = "select * from books where id=$selectBookId";
					$data = mysqli_query($conn,$select) or die('Selection Error');
					while($arr1=mysqli_fetch_assoc($data))
					{
					?>

			<div class="cart-info-section">
				<div class="cart-img">
					<div class="image">
						<img src="assets/img/<?php echo $arr1['image_path']; ?>" alt="img"/>
					</div>
				</div>
				<div class="cart-detail">
					<ul class="book-info">
						<li><span>Book: </span> <?php echo $arr1['title'];?></li>
						<li><span>Author:</span><?php echo $arr1['author'];?></li>
						<li><span>Quantity:</span><?php echo $qty;?></li>
						<li><span>Price:</span><?php echo "Rs. ".$arr1['price'];?></li>
					</ul>
				</div>
			</div>
			<div class="line"><hr/></div>

			<?php
					$tprice = $tprice+($arr1['price']*$qty);
					}
				}
			?>
		</div>
			<div class="totalAmount tamt">
				<h2>Total amount</h2>
				<h2>
					<?php
						echo "Rs. ".$tprice;
					?>

				</h2>
				<div class="button">
					<a href="database/placeOrderDb.php?cid=<?php echo $_SESSION['id'] ?> ">
						<input type="submit" name="order" value="Place Order"/></a>
					</div>
			</div>
			
		</div>


		<!--Footer Section-->
		<?php 
			include 'footer.php';
		?>
	</body>
</html>