<!DOCTYPE html>
<html>
	<head>
		<title>Order List</title>
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
		<div class="book-wrapper">
			<div class="title1"><h4>Order List</h4></div>
		<div class="book-table">
				
				<table border="1">
							<colgroup>
								<col width="5%">
								<col width="15%">
								<col width="15%">
								<col width="10%">
								<col width="15%">
								<col width="15%">
								<col width="25%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Date</th>
									<th class="text-center">Customer</th>
									<th class="text-center">Items</th>
									<th class="text-center">Total Amount</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = 1;
									$conn = mysqli_connect('localhost','root','','book_store_db') or die('Connection Error');
									$sel_bookid = "select * from orders";
									$data1 = mysqli_query($conn,$sel_bookid) or die('Selection Error');
									while($row=mysqli_fetch_assoc($data1)){
										//date
										$date = $row['date_created'];
										$date1 = date("d M Y", strtotime($date));

										//Status
										$a = $row["status"];
										$status = "";
										if($a == 0){
											$status = "Pending";
										}else{
											$status = "Confirmed";
										}

										//Customer Name
										$id1 = $row['customer_id'];
										$selectCustomer = "select name from customers where id = $id1";
										$name = "";
										$data2 = mysqli_query($conn,$selectCustomer) or die('Selection Error');
										while($row1=mysqli_fetch_assoc($data2)){
											$name = $row1['name'];
										}

										//Items
										$item = 0;
										$id2 = $row['id'];
										$selectItem = "select qty from order_list where order_id = $id2";
										$data3 = mysqli_query($conn,$selectItem) or die('Selection Error');
										while($row2=mysqli_fetch_assoc($data3)){
											$item = $item + $row2['qty'];
										}
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $date1 ?></td>
									<td class="text-center"><?php echo $name ?></td>
									<td class="text-center"><?php echo $item ?></td>
									<td class="text-center"><?php echo $row['total_amount'] ?></td>
									<td class="text-center"><?php echo $status ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_book" type="button" >
											<a href="viewOrder.php?orderId=<?php echo $row['id'] ?>">View</a></button>
										<button class="btn btn-sm btn-danger delete_book" type="button">
											<a href="deleteOrder.php?orderId=<?php echo $row['id'] ?>">Delete</a></button>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>

			</div>
		</div>
		</body>
		</html>