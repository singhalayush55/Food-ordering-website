<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php include 'partials/_nav.php';?>
    <?php
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $F_ID = $values["food_id"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $u_name = $_SESSION["username"];
    
    $gtotal = $gtotal + $total;


    $query="INSERT INTO `orders` ( `food_id`, `food_name`, `food_price`, `food_qty`, `username`) VALUES ( ' .$F_ID. ', ' $foodname ', $price ,  $quantity ,'$u_name');";
             

            //   $success = $conn->query($query); 
    $success=mysqli_query($conn,$query);         

      if(!$success)
      {
        ?>
    <div class="container">
        <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
        </div>
    </div>

    <?php
      }
      
  }

        ?>

    <div class="con">
        <div class="container">
            <div class="jumbotron">
                <h1>Choose your payment option</h1>
            </div>
        </div>
        <br>
        <h1 class="text-center">Grand Total: &#8377;<?php echo "$gtotal"; ?>/-</h1>
        <h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
        <br>
        <h1 class="text-center">
            <a href="cart.php"><button class="btn btn-warning"><span
                        class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
            <a href="onlinepay.php"><button class="btn btn-success"><span
                        class="glyphicon glyphicon-credit-card"></span> Pay Online</button></a>
            <a href="COD.php"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On
                    Delivery</button></a>
        </h1>
    </div>



    <br><br><br><br><br><br>
</body>

</html>
</body>

</html>