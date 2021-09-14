<?php
session_start();
	$message = "";
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	if( isset($_GET['error'])){
		if( $_GET['error'] == "login_first" ){
			$message = "Login First";
		}
	}
	if(isset($_POST['login']))
	{
		$select = "select username,password,name,id from users";
		$data = mysqli_query($connect,$select) or die('Selection Error');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$_SESSION['adminUsername']=$username;
		$_SESSION['adminPassword']=$password;
		while($arr=mysqli_fetch_assoc($data))
		{
			if($_SESSION['adminUsername'] == $arr['username'] && $_SESSION['adminPassword'] == $arr['password']){
				$_SESSION['adminUsername']=$arr['username'];
				$_SESSION['adminPassword']=$arr['password'];
				$_SESSION['adminName']=$arr['name'];
				$_SESSION['adminID']=$arr['id'];	
				header('refresh:0,URL=books.php');
				echo $_SESSION['name'];

				exit;
			}
			else{
				$message = "Username or Password Invalid";
			}
		}	
	}
?>