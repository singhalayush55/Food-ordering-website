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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,
body,
h1,
h2,
h3,
h4,
h5 {
    font-family: "Raleway", sans-serif
}

.conn{
    text-align:center;
}

.hh{
    background-color:rgba(222, 184, 135, 0.856);
}
.hhh{
    background-color:rgba(222, 184, 135, 0.856);
    padding: 5px;
    border-radius: 10px;
}
</style>

<body class="w3-light-grey">


    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-bar-item w3-right">MyOnlineMeal</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="../img/user.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome, <strong><?php echo $_SESSION['username']?></strong></span><br>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
        <a style="text-decoration:none; color:black" href="admin.php"><h5>Dashboard</h5></a>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="view_food_items.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i> 
                View Food
                Items</a>
            <a href="edit_food_items.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>  Edit
                Food Items</a>
            <a href="delete_food_items.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-trash fa-fw"></i> 
                Delete Food
                Items</a>
            <a href="add_food_items.php" class="w3-bar-item w3-button w3-padding "><i
                    class="fa fa-bullseye fa-fw"></i> Add Food Items</a>
            <a href="order.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  LogOut</a><br><br>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <div class="col-xs-3">

            <div class="form-area" style="padding: 10px 10px 110px 10px; ">

                <div style="text-align: center;">
                    <h3>Click On Menu <br><br></h3>
                </div>
                <?php
   
 

    if (isset($_GET['submit'])) {
    $F_ID = $_GET['dfid'];
    $name = $_GET['dname'];
    $price = $_GET['dprice'];
    $description = $_GET['ddescription'];


    $query = mysqli_query($conn, "UPDATE foodlist set food_name='$name', food_price='$price', food_desc='$description' where food_id='$F_ID'");
    }
    $query = mysqli_query($conn, "SELECT * FROM foodlist where options='ENABLE'");
    while ($row = mysqli_fetch_array($query)) {

      ?>

                <div class="list-group" style="text-align: center;">
                    <?php
      echo "<b><a href='edit_food_items.php?update= {$row['food_id']}'>{$row['food_name']}</a></b>";  
        ?>
                </div>


                <?php
    }
    ?>


                <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query1 = mysqli_query($conn, "SELECT * FROM foodlist WHERE food_id=$update");
    while ($row1 = mysqli_fetch_array($query1)) {

    ?>
            </div>
        </div>



        <div class="container">
            <div class="col-md-12">
                <div class="form-area conn" style="padding: 0px 100px 100px 100px; background:url('<?php echo $row1['img_path'];  ?>')">
                    <form action="edit_food_items.php" method="GET">
                        <br style="clear: both">
                        <h3  class="hh" style="margin-bottom: 25px; text-align: center; font-size: 30px;"> EDIT YOUR FOOD ITEMS HERE
                        </h3>

                        <div class="form-group">
                            <input class='input' type='hidden' name="dfid" value=<?php echo $row1['food_id'];  ?> />
                        </div>

                        <div class="form-group">
                            <label for="username"><span class="text-danger " style="margin-right: 5px;">*</span> <span class="hhh">Food
                                Name: </span></label>
                            <input type="text" class="form-control" id="dname" name="dname"
                                value=<?php echo $row1['food_name'];  ?> placeholder="Your Food name" required="">
                        </div>

                        <div class="form-group">
                            <label for="username"><span class="text-danger " style="margin-right: 5px;">*</span> <span class="hhh">Food
                                Price: </span></label>
                            <input type="text" class="form-control" id="dprice" name="dprice"
                                value=<?php echo $row1['food_price'];  ?> placeholder="Your Food Price (INR)" required="">
                        </div>

                        <div class="form-group">
                            <label for="username"><span class="text-danger " style="margin-right: 5px;">*</span> <span class="hhh">Food
                                Description:</span> </label>
                            <input type="text" class="form-control" id="ddescription" name="ddescription"
                                value="<?php echo $row1['food_desc'];  ?>" placeholder="Your Food Description"
                                required="">
                        </div>

                        <div class="form-group">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"
                                onclick="display_alert()" value="Display alert box"> Update </button>
                        </div>
                    </form>


                    <?php
}
}


  ?>

                </div>




            </div>


            <?php
mysqli_close($conn);
?>
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