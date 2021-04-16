<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>P and K stores|register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="alert alert-primary">
        <center><h4>Welcome to P and K online stores</h4></center>

      </div>
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h2 >Register</h2>
            <form method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="full_name" class="form-control"  required>
              </div>
              
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your email</label>
                <input type="email" name="email" class="form-control"   required>

              </div>
              
              <div class="mb-3">
                <label for="name" class="form-label">Your password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <button name="register" type="submit" class="btn btn-primary">Register</button>

            </form>
             <?php
            if (isset($_POST['register'])) {
              $fullName = $_POST['full_name'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              

              $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
              insertDataToTable($fullName,$email,$encryptedPassword);

            }
            function insertDataToTable($fullName,$email,$password){
              //connection to db
              require('connect.php');
              $sql = "INSERT INTO User(`full_name`, `email`, `password`) VALUES (?,?,?)";

              //prepare the query
              if($stmt = mysqli_prepare($conn,$sql)){
                //bind values
                mysqli_stmt_bind_param($stmt,"sss",$param_fullname,$param_email,$param_password);

                $param_fullname = $fullName;
                $param_email = $email;
    						$param_password = $password;

                if (mysqli_stmt_execute($stmt)){
                  echo "Registered Successfully";
               
                }else {
                  	echo "<h4 style='color:red'>Something went wrong</h4>".mysqli_error($conn);
                }
              }
              else {
                echo "Something went wrong".mysqli_error($conn);
              }
              //close connection
              mysqli_close($conn);
            }

             ?> 
            


          </div>


        </div>

      </div>

    </div>

  </body>
</html>