<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';
$username=$_SESSION['username'];
?>

<?php

if(isset($_POST['update'])){
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $mobile = $_POST['phone'];
    $address = $_POST['address'];
    


    $query = mysqli_query($conn, "UPDATE users set password='$pass', mobile='$mobile', address='$address' where username='$username'");
    if($query){
        echo '<script>
        alert("Your profile has successfully changed!");
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPROFILE</title>
    <style>


        .htt{
            width:80px;
        }
        body{
            background-color: rgba(95, 158, 160, 0.568);
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>



<body style="background-color: rgba(106, 107, 47, 0.562);">
    <?php include 'partials/_nav.php'?>
    <div class="container bootstrap snippets bootdey" style="margin-top: 10px;">
        <h1 class="hh"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img src="img/user.png" class="avatar img-circle htt" alt="avatar">
                    <h6>Upload Photo...</h6>

                    <input type="file" class="form-control">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <h3>Personal info</h3>
                <?php 
                $sql="SELECT * FROM `users` WHERE `username` LIKE '$username'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                ?>
                <form  action="" method="POST">
                <input name="id" type="hidden" value="<?php echo $row['user_id'];?>" />
                    <div class="form-group">
                        <label class="col-lg-3 control-label">UserName:</label>
                        <div class="col-lg-8">
                        <!-- <?php echo $row['user_id']; ?> -->
                            
                            <input class="form-control" name="username" type="text" value="<?php echo $row['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="pass" type="password" value="<?php echo $row['password'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="phone" type="text" value="<?php echo $row['mobile']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="address" type="text" value="<?php echo $row['address']; ?>">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-lg-8">
                            <input type="submit" name="update" value="UPDATE" class="btn btn-success"> 
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
    <hr>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>