<!DOCTYPE html>
<html>
	<head>
		<title>Books</title>
		<link rel='stylesheet' href='../css/header.css' type='text/css'/>
		<link rel='stylesheet' href='../css/button.css' type='text/css'/>
		<link rel='stylesheet' href='../css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="../css/adminBookTable.css"/>
		<link rel="stylesheet" href="../css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<link rel='stylesheet' href='../css/login.css' type='text/css'/>
	</head>
	<body>
		<?php
			include('adminHeader.php');
		?>
		<!--Books detail-->
		<div class="book-wrapper">
			<div class="title"><h4>Books</h4></div>
			<div class="addBook">
				<h4><a href="addBook.php">Add Book</a></h4>
			</div>
			<div class="book-table">
				
				<table border="1">
							<colgroup>
								<col width="5%">
								<col width="15%">
								<col width="30%">
								<col width="20%">
								<col width="15%">
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">IMG</th>
									<th class="text-center">Details</th>
									<th class="text-center">Category</th>
									<th class="text-center">Price</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cname[0] = "Not Set";
								$conn = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
								$categories = $conn->query("SELECT * FROM categories ");
								while($row = $categories->fetch_assoc()){
									$cname[$row['id']] = ucwords($row['name']);
								}
								$book = $conn->query("SELECT * from books order by title asc");
								while($row=$book->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<div class="d-flex w-100">
					    					<div class="img-field mr-4 img-thumbnail rounded">
					    						<img src="../assets/img/<?php echo $row['image_path'] ?>"  alt="" class="img-fluid rounded">
					    					</div>
										</div>
									</td>
									<td class="">
										<p>Title: <b><?php echo $row['title'] ?></b></p>
										<p><small>Author: <b><?php echo $row['author'] ?></b></small></p>
										<p><small>Description: <b class="truncate"><?php echo $row['description'] ?></b></small></p>
									</td>
									<td class="">
										<p>
											<b>
											<?php 
											$cats = '';
											$cat = explode(',', $row['category_ids']);
											foreach ($cat as $key => $value) {
												if(!empty($cats)){
													$cats .=", ";
												}
												if(isset($cname[$value])){
													$cats .= $cname[$value];
												}
											}
											echo $cats;
											?>
											</b>
										</p>
									</td>
									<td class="">
										<p class="text-right"><b><?php echo number_format($row['price'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_book" type="button" >
											<a href="editBook.php?bookId=<?php echo $row['id'] ?>">Edit</a></button>
										<button class="btn btn-sm btn-danger delete_book" type="button">
											<a href="deleteBook.php?bookId=<?php echo $row['id'] ?>">Delete</a></button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>

			</div>
		</div>

		
		
	</body>
</html>