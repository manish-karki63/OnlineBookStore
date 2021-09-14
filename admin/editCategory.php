<?php
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	$id = $_GET['categoryId'];
	$select = "select * from categories where id = $id";
	$data1 = mysqli_query($connect,$select) or die('Selection Error of book id');
	if(isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$description=$_POST['description'];
		$update = "update categories
		set name = '$title',description = '$description' where id = $id";
		mysqli_query($connect,$update) or die('Update Error'." ".$update);
		header('refresh:0,URL=category.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Category</title>
		<link rel='stylesheet' href='../css/header.css' type='text/css'/>
		<link rel='stylesheet' href='../css/button.css' type='text/css'/>
		<link rel='stylesheet' href='../css/footer.css' type='text/css'/>
		<link rel="stylesheet" href="../css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='../css/login.css' type='text/css'/>
	</head>
	<body>
		<?php
			include('adminHeader.php');
		?>

			<!--Update Category-->
			<div class="login-form">
			<div class="login-form-wrapper">
				<h3>Update Category</h3>
				<form action="" method="post" onsubmit="return validate(this);">
					<?php 
						while($arr=mysqli_fetch_assoc($data1)){
					?>
					<div class="input-group">
						<label>Name</label>
						<input type="text" name="title" value="<?php echo $arr['name']?>" />
						<span class="titlemsg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Description</label>
						<textarea name = "description"> <?php echo $arr['description']?></textarea>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Update"/>
					</div>
				<?php } ?>
				</form>
			</div>
		</div>
		
	</body>
</html>