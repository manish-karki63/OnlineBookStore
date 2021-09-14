<?php
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	$id = $_GET['bookId'];
	if(isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$author=$_POST['author'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$update = "update books set title ='$title',author='$author',
		description='$description',price = '$price' where id = '$id'";
		mysqli_query($connect,$update) or die('Update Error'. $update);
		header('refresh:0,URL=books.php');
	}
?>