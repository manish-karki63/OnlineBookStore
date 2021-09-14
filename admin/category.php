<?php
	$connect = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	if(isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$description=$_POST['description'];
		$insert = "insert into categories(name,description) 
		values ('$title','$description')";
		mysqli_query($connect,$insert) or die('Insertion Error'." ".$insert);
		header('refresh:0,URL=category.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Category</title>
		<link rel='stylesheet' href='../css/category.css' type='text/css'/>
		<link rel='stylesheet' href='../css/header.css' type='text/css'/>
		<link rel='stylesheet' href='../css/button.css' type='text/css'/>
		<link rel='stylesheet' href='../css/footer.css' type='text/css'/>
		<link rel="stylesheet" href="../css/adminBookTable.css" type="text/css"/>
		<link rel="stylesheet" href="../css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='../css/login.css' type='text/css'/>
	</head>
	<body>
		<?php
			include('adminHeader.php');
		?>

		<div class="category">

			<!--Add Category-->
			<div class="add-category">
				<h2>Add Category</h2>
				<form action="" method="post" onsubmit="return validate(this);" enctype='multipart/form-data'>
					<div class="input-group">
						<label>Name</label>
						<input type="text" name="title" />
						<span class="titlemsg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Description</label>
						<textarea name = "description"></textarea>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Add"/>
					</div>
				</form>
			</div>

			<!--Display Category-->
			<div class="display-category">
				<table border="1">
							<colgroup>
								<col width="10%">
								<col width="20%">
								<col width="40%">
								<col width="30%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
									<th class="text-center">Description</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = 1;
									$select = "select * from categories";
									$data1 = mysqli_query($connect,$select) or die('Selection Error of book id');
									while($arr=mysqli_fetch_assoc($data1)){
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $arr['name'] ?></td>
									<td class="text-center"><?php echo $arr['description'] ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_category" type="button" >
											<a href="editCategory.php?categoryId=<?php echo $arr['id'] ?>">Edit</a></button>
										<button class="btn btn-sm btn-danger delete_category" type="button">
											<a href="deleteCategory.php?categoryId=<?php echo $arr['id'] ?>">Delete</a></button>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
			</div>
		</div>
		
	</body>
</html>