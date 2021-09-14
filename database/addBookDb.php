<?php
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	if(isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$author=$_POST['author'];
		$description=$_POST['description'];
		$categories = '';
		if(isset($_POST['category'])){
			$categories = implode(',',$_POST['category']);
		}
		//echo $categories;
		$price=$_POST['price'];
		$images=$_FILES['images']['name'];
		//echo $images;
		$date = date("Y-m-d H:i:s");
		$insert = "insert into books(title,author,description,category_ids,price,image_path,date_created) 
		values ('$title','$author','$description','$categories','$price','$images','$date')";
		mysqli_query($connect,$insert) or die('Insertion Error'." ".$insert);
		echo "<script>alert('Book Added Successfully');</script>";
		header('refresh:0,URL=books.php');
	}
?>