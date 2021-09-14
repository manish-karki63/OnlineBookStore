<?php
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	$id = $_GET['bookId'];
	$delete = "delete from books where id = $id";
	mysqli_query($connect,$delete) or die('Deletion Error');
	header('refresh:0,URL=books.php');
?>