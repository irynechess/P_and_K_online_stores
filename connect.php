<?php
define('username', 'root');
define('server', 'localhost');
define('password', '');
define('database', 'product');

$conn = mysqli_connect(server,username,password,database);
 if ($conn) {
 	echo "Connected Successfully";
 } else {
     echo "Failed to establish connection!";
 }
 





?>