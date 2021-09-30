<?php
	$id = $_GET['orderId'];
	$connect = mysqli_connect("localhost", "root","","book_store_db") or die('Connection Error');
	$delete = "delete from order_list where order_id = $id";
	mysqli_query($connect,$delete) or die("Deletion Error for Order List");
	$del = "delete from orders where id = $id";
	mysqli_query($connect,$del) or die("Deletion Error for Order");
	header('refresh:0,URL=order.php');
?>