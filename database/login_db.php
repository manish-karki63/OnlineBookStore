<?php
	session_start();
	$message = "";
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	if( isset($_GET['error'])){
		if( $_GET['error'] == "login_first" ){
			$message = "Login First";
		}
	}
	//require('Database/login_db.php' );
	if(isset($_POST['login']))
	{
		$select = "select email,password,name from customers";
		$data = mysqli_query($connect,$select) or die('Selection Error');
		$email = $_POST['email'];
		$password = $_POST['password'];
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;
		while($arr=mysqli_fetch_assoc($data))
		{
			if($_SESSION['email'] == $arr['email'] && $_SESSION['password'] == $arr['password']){
				$_SESSION['email']=$arr['email'];
				$_SESSION['password']=$arr['password'];
				$_SESSION['name']=$arr['name'];
				header('refresh:0,URL=index.php');
				exit;
			}
			else{
				$message = "Username or Password Invalid";
			}
		}	
	}
?>