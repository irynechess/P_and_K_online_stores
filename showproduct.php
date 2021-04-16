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
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Cost</th>
			</tr>
			<?php
			require('connect.php');
			$sql="SELECT  * FROM products";
			$result = mysqli_query($conn,$sql);
             if ($result) {
             	$rows = mysqli_num_rows($result);

             	if ($rows>0) {
             		while ($record = mysqli_fetch_assoc($result)) {
             			echo "<tr>";
             			echo "<td>".$record['Product']."</td>";
             			echo "<td>".$record['Description']."</td>";
             			echo "<td style = 'color:red'>".'kes'.$record['Cost']."</td>";
             			echo "<tr>";




             		}

             		# code...
             	}

             	# code...
             }


			?>
			
		</table>
		
	</div>
	
</div>
</body>
