<!DOCTYPE html>
<html>
<head>
	<title>P and K Stores </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<?php
include('nav.php')?>
<div class="container">
	<div class="col">
		<div class="row">
			<?php

				//connecttion
				require('connect.php');

				//select query
				$sql = "SELECT * FROM products";

				//execute query
				$results = mysqli_query($conn,$sql);
				//check if query is query
				if ($results) {
					
					if (mysqli_num_rows($results)>0) {
						
						while ($record = mysqli_fetch_assoc($results)) {
							
							echo '
								<div class="card col-4" style="">
								  <div class="card-body">
								  	 <img class="card-img-top" src="https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/76/414053/1.jpg?7990" alt="Card image cap">
								    <h5 class="card-title">'.$record['Product'].'</h5>
								    <p class="card-text" rows="3">'.$record['Description'].'.</p>
								    <h4 style="color:#E53206;">Ksh'.$record['Cost'].'</h4>
								    <a href="order.php" class="btn btn-primary">Order</a>

						
								  </div>
								</div>
							';
						}
						
						}else{
						echo "<h4>No Products available</h4>";
						
					}
				}else{
					echo "Something went wrong!!".mysqli_error($conn);

				}

				?>

				



			
			
		</div>
		
	</div>
</div>
</body>
