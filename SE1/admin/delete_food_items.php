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
            <a style="text-decoration:none; color:black" href="admin.php">
                <h5>Dashboard</h5>
            </a>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="view_food_items.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i> 
                View Food
                Items</a>
            <a href="edit_food_items.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Edit
                Food Items</a>
            <a href="delete_food_items.php" class="w3-bar-item w3-button w3-padding w3-blue"><i
                    class="fa fa-trash fa-fw"></i> 
                Delete Food
                Items</a>
            <a href="add_food_items.php" class="w3-bar-item w3-button w3-padding "><i
                    class="fa fa-bullseye fa-fw"></i> Add Food Items</a>
            <a href="order.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> 
                Orders</a>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> 
                LogOut</a><br><br>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <div class="col-xs-9">
            <div class="form-area" style="padding: 0px 100px 100px 100px;">
                <form action="delete_food_items1.php" method="POST">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> DELETE YOUR FOOD ITEMS FROM
                        HERE </h3>


                    <?php



// Storing Session
$user_check=$_SESSION['login_user1'];
$sql = "SELECT * FROM foodlist f WHERE f.options = 'ENABLE'  ORDER BY food_id";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th> # </th>
                                <th> Food ID </th>
                                <th> Food Name </th>
                                <th> Price </th>
                                <th> Description </th>
                            </tr>
                        </thead>

                        <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

                        <tbody>
                            <tr>
                                <td> <input name="checkbox[]" type="checkbox" value="<?php echo $row['food_id']; ?>" />
                                </td>
                                <td><?php echo $row["food_id"]; ?></td>
                                <td><?php echo $row["food_name"]; ?></td>
                                <td><?php echo $row["food_price"]; ?></td>
                                <td><?php echo $row["food_desc"]; ?></td>
                            </tr>
                        </tbody>

                        <?php } ?>
                    </table>
                    <br>
                    <div class="form-group">
                        <button type="submit" id="submit" name="delete" value="Delete"
                            class="btn btn-danger pull-right"> DELETE</button>
                    </div>

                    <?php } else { ?>

                    <h4>
                        <center>0 RESULTS</center>
                    </h4>

                    <?php } ?>

                </form>


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