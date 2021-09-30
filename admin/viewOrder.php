<?php 
	$conn = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Order</title>
		<link rel='stylesheet' href='../css/header.css' type='text/css'/>
		<link rel='stylesheet' href='../css/button.css' type='text/css'/>
		<link rel='stylesheet' href='../css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="../css/cart.css"/>
		<link rel="stylesheet" href="../css/fontAwesome/css/font-awesome.css" type="text/css"/>
	</head>
	<body>
		<?php
			include('adminHeader.php');
		?>

		<div class="cart-info-wrapper">
			<h3>Order Information</h3>
			<div class = "carts">
			<?php
				session_start();
				$id = $_GET['orderId'];
				$_SESSION['orderId'] = $id;
				$tprice = 0;
				$sel_bookid = "select * from order_list where order_id=$id";
				$data1 = mysqli_query($conn,$sel_bookid) or die('Selection Error of book id'.$sel_bookid);
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
						<img src="../assets/img/<?php echo $arr1['image_path']; ?>" alt="img"/>
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
					}
				}
				$customerId = 0;
				$customerName = '';
				$customerAddress = '';
				$status = 0;
				$select3 = "select * from orders where id = $id";
				$data3 = mysqli_query($conn,$select3) or die('Selection Error of Order');
				while($arr3=mysqli_fetch_assoc($data3)){
					$customerId = $arr3['customer_id'];
					$customerAddress = $arr3['address'];
					$tprice = $arr3['total_amount'];
					$status = $arr3['status'];
				}
				$sel = "select name from customers where id = $customerId";
				$dat = mysqli_query($conn,$sel) or die('Selection Error of Customer Name');
				while($ar = mysqli_fetch_assoc($dat)){
					$customerName = $ar['name'];
				}
				$sat = '';
				if($status == 0){
					$sat = "Confirmed";
				}else{
					$sat = "Pending";
				}
			?>
		</div>
			<div class="totalAmount tamt">
				<h3>Customer Information</h3>
				<div class="order-detail">
					<ul class="customer-info" style="list-style: none; ">
						<li><span>Customer: </span> <?php echo $customerName;?></li>
						<li><span>Delivery Address: </span><?php echo $customerAddress;?></li>
						<li><span> Total Price: </span><?php echo "Rs. ".$tprice;?></li>
						<li><span>Update to: </span>
						<a href="updateOrder.php?status=<?php echo $sat;?>">
							<input type="submit" name="<?php echo $sat;?>" value="<?php echo $sat;?>"/></a>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</body>
</html>