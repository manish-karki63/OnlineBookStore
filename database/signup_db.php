<?php
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	if(isset($_POST['signup'])){
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$date = date('Y-m-d h:i:s',time());
		if($password == $cpassword){
			$insert = "insert into customers(name,address,contact,email,password,date_created)
			values('$name','$address','$contact','$email','$password','$date')";
			mysqli_query($connect,$insert) or die("Insertion Error");
		}else{
			die('Enter Same password');
		}
	}
?>