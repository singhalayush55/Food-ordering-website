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
<html>
<title>ADMIN PANEL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body class="w3-light-grey">

    <!-- Top container -->
    <?php include 'partials/_nav.php';?>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>


    <!-- All Sql Queries for card content -->

    <?php 
    date_default_timezone_set("Asia/Calcutta");
    $curr_date=date("Y-m-d");
    // echo $curr_date;
    //today order
    $sql="select username,sum(food_price*food_qty) as payment from orders where order_date='$curr_date' group by username desc";
    $result=mysqli_query($conn,$sql);
    $today_order=mysqli_num_rows($result);
    
    //today sale
    $sql2="select username,sum(food_price*food_qty) as payment from orders where order_date='$curr_date' group by order_date desc";
    $result2=mysqli_query($conn,$sql2);
    $row = mysqli_fetch_assoc($result2);
    $today_sale=$row['payment'];
    
    //total order
    $sql3="select * from orders";
    $result3=mysqli_query($conn,$sql3);
    $total_order=mysqli_num_rows($result3);
    
    //total sale
    $sql4="select sum(food_price*food_qty) as payment from orders";
    $result4=mysqli_query($conn,$sql4);
    $row2 = mysqli_fetch_assoc($result4);
    $total_sale=$row2['payment'];

    
    ?>


    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- <?php echo $curr_date;?> -->
    <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Today's Order</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span><?php echo $today_order;?></span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right"><?php echo $today_order;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Today's Sale</h6>
                            <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>₹<?php echo $today_sale;?></span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-dark order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Order</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span><?php echo $total_order;?></span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right"><?php echo $total_order;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Sale</h6>
                            <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>₹<?php echo $total_sale;?></span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total User</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-info order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Items</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
        </script>

</body>

</html>