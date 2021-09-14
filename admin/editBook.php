<?php
	include('../database/editBookDb.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Books</title>
		<link rel='stylesheet' href='../css/header.css' type='text/css'/>
		<link rel='stylesheet' href='../css/button.css' type='text/css'/>
		<link rel='stylesheet' href='../css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="../css/adminBookTable.css"/>
		<link rel="stylesheet" href="../css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='../css/addBook.css' type='text/css'/>
	</head>
	<body>
		<?php
			include('adminHeader.php');
			$id = $_GET['bookId'];
			$select = "select * from books where id = '$id' ";
			$data = mysqli_query($connect,$select) or die('Selection Error');
			while($arr=mysqli_fetch_assoc($data)){
		?>
		<div class="book-form">
			<div class="book-form-wrapper">
				<h2>Book Information</h2>
				<form action="" method="post" onsubmit="return validate(this);">
					<div class="input-group">
						<label>Title</label>
						<input type="text" name="title" value='<?php echo $arr['title']?>' />
						<span class="titlemsg" style="color: red;"></span>
					</div>
					<div class="input-group">	
						<label>Author</label>
						<input type="text" name="author" value='<?php echo $arr['author']?>'/>
						<span class="author-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Description</label>
						<textarea name="description"><?php echo $arr['description']?></textarea>
					</div>
					<div class="input-group">			
						<label>Price</label>
						<input type="text" name="price" value='<?php echo $arr['price']?>'/>
						<span class="price-msg" style="color: red;"></span>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Update"/>
					</div>
				</form>
			</div>
		</div>
		<?php } ?>
	</body>
</html>