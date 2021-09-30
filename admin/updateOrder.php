<?php
	session_start();
	$id = $_SESSION['orderId'];
	$status = $_GET['status'];
	$val = 0;
	if($status == "Pending"){
		$val = 0;
	}else{
		$val = 1;
	}
	$connect = mysqli_connect("localhost","root","","book_store_db") or die("Connection Error");
	$update = "update orders set status = $val where id = $id";
	mysqli_query($connect,$update) or die("Update Error for Order");
	$_SESSION['orderId'] = "";
	header('refresh:0,URL=order.php');
?>