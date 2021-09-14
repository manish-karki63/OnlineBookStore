<?php 
	$cid = $_GET['cid'];
	$address = "";
	$totalAmount = 0;
	$status = 0;
	$date = date("Y-m-d H:i:s");
	$oid = "";
	$bid = "";
	$qty = "";
	$price = "";
	$connect = mysqli_connect("localhost","root","","book_store_db") or die("Connection Error");
	
	$select = "select address from customers where id = $cid";
	$data = mysqli_query($connect,$select) or die("Selection Error");
	while($row = mysqli_fetch_assoc($data)){
		$address = $row['address'];
	}
	
	$selectCart = "select * from cart where customer_id = $cid";
	$data1 = mysqli_query($connect,$selectCart) or die("Selection of Cart Error");
	while($row1 = mysqli_fetch_assoc($data1)){
		$totalAmount += $row1['qty']* $row1['price'];
	}
	
	$insert = "insert into orders(customer_id,address,total_amount,status,date_created)
	values ($cid,'$address',$totalAmount,$status,'$date')";
	mysqli_query($connect,$insert) or die("Insertion Error".$insert);
	
	$selectOrder = "select id from orders where customer_id = $cid";
	$data2 = mysqli_query($connect,$selectOrder) or die("Selection Error of Order Id");
	while($row2=mysqli_fetch_assoc($data2)){
		$oid = $row2['id'];
	}

	$data2 = mysqli_query($connect,$selectCart) or die("Selection of Cart Error");
	while($row3 = mysqli_fetch_assoc($data2)){
		$bid = $row3['book_id'];
		$qty = $row3['qty'];
		$price = $row3['price'];
		$insert1 = "insert into order_list(order_id,book_id,qty,price)
		values($oid,$bid,$qty,$price)";
		mysqli_query($connect,$insert1) or die("Order List Insertion Error");
	}

	$delete = "delete from cart where customer_id = $cid";
	mysqli_query($connect,$delete) or die("Deletion Error of Cart".$delete);
	echo "<script>alert('Order Placed Successfully');</script>";
	header('refresh:0,URL=../index.php');
?>