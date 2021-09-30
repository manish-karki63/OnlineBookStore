<?php
session_start();
	$conn= new mysqli('localhost','root','','book_store_db')or die("Could not connect to mysql".mysqli_error($con));
?>
<!DOCTYPE html>
	<head>
		<title>Home Page</title>
		<link rel='stylesheet' href='css/header.css' type='text/css'/>
		<link rel='stylesheet' href='css/footer.css' type='text/css'/>
		<link rel='stylesheet' href='css/index.css' type='text/css'/>
		<link rel="stylesheet" href="css/fontAwesome/css/font-awesome.css" type="text/css"/>
		<style>
		    #cat-list li{
		        cursor: pointer;
		    }
		    #cat-list li:hover {
		        color: white;
		        background: #007bff8f;
		    }
		    .prod-item p{
		        margin: unset;
		    }
		    .bid-tag {
		    	position: absolute;
		    	right: .5em;
			}
		</style>
	</head>
	<body>
		<?php 
			$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
			include('header.php');
		?>

		<div class="contain-fluid">
    		<div class="col-lg-12">
        		<div class="row1">
            		
            		<div class="col-md-9">
                		<div class="card">
                    		<div class="card-body">
                        		<div class="row">
                            		<?php
                                		$where = "";
                                		if($cid > 0){
                                    		$where  = " where CONCAT('[',REPLACE(category_ids,',','],['),']') LIKE '%[".$cid."]%'  ";
                                		}
                                		$books = $conn->query("SELECT * from books $where order by title asc");
                                		if($books->num_rows <= 0){
                                    		echo "<center><h4><i>No Available Product.</i></h4></center>";
                               			} 
                                		while($row=$books->fetch_assoc()):
                             		?>
                             		<div class="col-sm-4">
                                 		<div class="card">
                                    		<div class="float-right align-top bid-tag">
                                         		<span class="badge badge-pill badge-primary text-white"><i class="fa fa-tag"></i> <?php echo number_format($row['price']) ?></span>
                                     		</div>
                                     		<div class="card-img-top d-flex justify-content-center" style="max-height: 30vh;overflow: hidden">
                                     			<img class="img-fluid" src="assets/img/<?php echo $row['image_path'] ?>" alt="Card image cap">
                                       
                                     		</div>
                                      		<div class="float-right align-top d-flex">
                                     		</div>
                                     		<div class="card-body prod-item">
                                         		<p>Title: <?php echo $row['title'] ?></p>
                                         		<p>Author: <?php echo $row['author'] ?></p>
                                         		<p>
                                            		<small>
                                          				<?php 
                                          					$cats = '';
                                          					$cat = explode(',', $row['category_ids']);
                                          					foreach ($cat as $key => $value) {
	                                            				if(!empty($cats)){
	                                              					$cats .=", ";
	                                            				}
	                                            				if(isset($cat_arr[$value])){
	                                              					$cats .= $cat_arr[$value];
	                                            				}
                                          					}
                                          					echo $cats;
                                          				?>
                                            
                                            		</small>
                                          		</p>
                                         		<p class="truncate"><?php echo $row['description'] ?></p>
                                        		<button class="btn btn-primary btn-sm view_prod" type="button" ><a href="bookDetail.php?id=<?php echo $row['id']; ?>" style="color: #fff; text-decoration: none;">View</a> </button>
                                     		</div>
                                 		</div>
                             		</div>
                            		<?php endwhile; ?>
                            	</div>
                    		</div>
                		</div>
            		</div>
        		</div>
    		</div>
    	</div>	
		<?php 
			include 'footer.php';
		?>
	</body>
</html>