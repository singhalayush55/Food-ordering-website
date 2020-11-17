<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../partials/_dbconnect.php';
    $username=$_POST["ad_username"];
    $password=$_POST["ad_password"];
    $exists=false;
    $sql="Select * from admin where admin_name='$username' AND admin_pass='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
      $login=true;
      session_start();
      $_SESSION['loggedin']= true;
      $_SESSION['username']=$username;
      header("location:admin.php");
    }
    else{
      $showError="invalid credentials";
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style3.css">

    <title>LOGIN PAGE</title>
    <style>
    body {
        background-image: url("../css/bg4.jpg");
    }
    </style>
</head>

<body>



    <div class="container my-4">
        <h1 class="text-center dark">Admin Panel</h1>
        <form action="/SE1/admin/index.php" method="post">
            <div class="form-group">
                <label for="ad_username" class="Lu">User Name</label>
                <input type="emai my-4l" class="form-control" id="username" name="ad_username"
                    aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="ad_passw my-4ord" class="Lu">Password</label>
                <input type="password" class="form-control" id="password" name="ad_password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br><br>
        <a href="../">User Login</a>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>