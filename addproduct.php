<!DOCTYPE html>
<html>
<head>
	<title>My shop|Add Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	        <?php include('nav.php')?>
	
		<div class="row">
			<div class="col-4">
				<img src="https://cdn3.vectorstock.com/i/thumb-large/52/92/set-shopping-icons-signs-and-symbols-vector-1785292.jpg" class="img-fluid">
				<div class="col-6">
					<form method="POST" action="">
						<div class="mb-3">
							<label for ="exampleInputEmail1" class="form-label">Product Name</label>
							<input type="text" class="form-control" name="product_name">
						</div>
						<div class="mb-3">
							<label for ="exampleInputEmail1" class="form-label">Product Description</label>
							<input type="text" class="form-control" name="product_desc">
						</div>
						<div class="mb-3">
							<label for ="exampleInputEmail1" class="form-label">Product Cost</label>
							<input type="number" class="form-control" name="product_cost">
						</div>

					<button name="submit" type="submit" class="btn btn-primary">SAVE</button>	
						
					</form>
					
				</div>
				<?php
				require('connect.php');
				if (isset($_POST['submit'])) {
					echo "successfully saved";
					$name=$_POST['product_name'];
					$Description=$_POST['product_desc'];
					$Cost=$_POST['product_cost'];

					$sql="INSERT INTO `products`(`Product`, `Description`, `Cost`) VALUES(?,?,?)";
					if ($stmt=mysqli_prepare($conn,$sql)){mysqli_stmt_bind_param($stmt,"ssi",$param_Product,$param_Description,$param_Cost);

					$param_Product=$name;
					$param_Description=$Description;
					$param_Cost=$Cost;
					if (mysqli_stmt_execute($stmt)){echo "Added successfully";
						# code...
					}
					else{echo "something went wrong!".mysqli_error($conn);
					}
					mysqli_stmt_close($stmt);
	
					}
					else{echo "error in query";
					}
					mysqli_close($conn);

				
				}
				



				?>
				
			</div>
			 
		</div>
		
	</div>

</body>
</html>>