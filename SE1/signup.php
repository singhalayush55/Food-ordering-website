<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'partials/_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
    // $password=sha1($password);
    // $cpassword=sha1($cpassword);
    $existSql="SELECT * FROM `users` WHERE username='$username' ";
    $result=mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0){
        $showError="Username already exists";
    }
    else{
        if(($password==$cpassword)){
          // $sql="INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";

          $sql="INSERT INTO `users` ( `username`, `password`, `mobile`, `address`, `dt`) VALUES ('$username', '$password', '$mobile', '$address', current_timestamp())";
          $result=mysqli_query($conn,$sql);
          if($result){
            $showAlert=true;
          }
        }
        else{
          $showError="passwords do not match";
        }}

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style3.css">
    <style>
    body{
          background-image: url("css/bg3.jpg");
        }
      </style>
    <title>SIGN UP PAGE</title>
  </head>
  <body>
    <?php require'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> You have successfully signed up.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';  
         }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error</strong> '.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';  
         }?>

    
    
    <div class="container my-4">
      <h1 class="text-center Lg">SignUp to our WebSite</h1>
      <form action="/SE1/signup.php" method="post">
        <div class="form-group">
          <label for="username" class="Lu">User Name</label>
          <input type="emai my-4l" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
          
        </div>
        <div class="form-group">
          <label for="passw my-4ord" class="Lu">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
          <label for="cpassword" class="Lu">Confirm Password</label>
          <input type="password" class="form-control" id="cpassword" name="cpassword">
          <small id="emailHelp" class="form-text text-muted Luu">type same password.</small>
        </div>
        <div class="form-group">
          <label for="mobile" class="Lu">Mobile</label>
          <input type="text" class="form-control" id="mobile" name="mobile">
        </div>
        <div class="form-group">
          <label for="address" class="Lu">Address</label>
          <input type="text" class="form-control" id="address" name="address">
        </div>
        <button type="submit" class="btn btn-primary">SignUp</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>