<?php
	include('../database/addBookDb.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Books</title>
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
		?>
		<div class="book-form">
			<div class="book-form-wrapper">
				<h2>Book Information</h2>
				<form action="" method="post" onsubmit="return validate(this);" enctype='multipart/form-data'>
					<div class="input-group">
						<label>Title</label>
						<input type="text" name="title" />
						<span class="titlemsg" style="color: red;"></span>
					</div>
					<div class="input-group">	
						<label>Author</label>
						<input type="text" name="author"/>
						<span class="author-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Description</label>
						<textarea name = "description"></textarea>
					</div>
					
					<div class="input-group">
						<label>Category</label>
						<select id="" name="category[]" multiple>
							<?php
								$select = "select * from categories";
								$data = mysqli_query($connect,$select) or die('Selection Error');
								while($arr=mysqli_fetch_assoc($data)){
									$id = $arr['id']; ?>
									<option value='<?php echo $id;?>'><?php echo $arr['name'];?></option>
									<?php
								}
							?>
						</select>
						<span class="author-msg" style="color: red;"></span>
					</div>
					<div class="input-group">			
						<label>Price</label>
						<input type="text" name="price"/>
						<span class="price-msg" style="color: red;"></span>
					</div>
					<div class="input-group">
						<label>Image</label> 
						<input type='file' name='images' accept="image/*"/>
						<span class="image-msg" style="color: red;"></span>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Add"/>
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>