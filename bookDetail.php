<?php
session_start();
$conn = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
	if(isset($_GET['id'])){
		$qry = $conn->query("SELECT * FROM books where id= ".$_GET['id']);
		foreach($qry->fetch_array() as $k => $val){
			$$k=$val;
		}
		if(!empty($category_ids))
		$cat_qry = $conn->query("SELECT * FROM categories where id in ($category_ids)");
		$cname = array();
		while($row=$cat_qry->fetch_array()){
			$cname[$row['id']] = ucwords($row['name']);
		}
	}
	if(isset($_POST['submit'])){
		if(!isset($_SESSION['id'])){
			header('refresh:0,URL=login.php');
		}
		$cid = $_SESSION['id'];
		$id = $_GET['id'];
		$num = $_POST['num'];
		$insert = "insert into cart(book_id,qty,price,customer_id) values($id,$num,$price,$cid)";
		mysqli_query($conn,$insert) or die('Insertion Error'.$insert);
	}
?>

<!DOCTYPE html>
	<head>
		<title>Book Detail</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="css/bookDetail.css">
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		
	</head>
	<body>
		<?php
			include('header.php');
		?>

		<!--Book Detail-->
		<div class="book-info-section">
			<div class="image">
				<img src="assets/img/<?php echo $image_path?>" alt="img"/>
			</div>
			<div class="book-container">
				<ul class="book-info">
					<li><span>Title:</span><b><?php echo $title?></b></li>
					<li><span>Author:</span><b><?php echo $author?></b></li>
					<li><span>Category:</span><b>
					    <?php 
					      $cats = '';
					      $cat = explode(',', $category_ids);
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
					    </b></li>
					<li><span>Price:</span><b><?php echo $price?></b></li>
					<li><span>Description:</span>
						<p><?php echo $description?></p>
					</li>
				</ul>
				<div>
					<form action="" method = "post">
					<input type="number" name="num" value="1" />
					<input type="submit" name="submit" value="Add to Cart" style="background: grey; color:white; text-transform:uppercase;
	line-height:1; padding:15px 45px; outline:0; border: 1px solid transparent;	font-weight: 400;
	font-size: 14px; cursor: pointer; border-radius: 25px; border: 2px solid grey; transition: all 0.3s ease;" />
</form>
				</div>
			</div>
		
		</div>



		<!--Footer-->
		<?php 
			include 'footer.php';
		?>
	</body>
</html>