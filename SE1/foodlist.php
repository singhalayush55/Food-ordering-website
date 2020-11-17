<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style_menu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Piazzolla:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .menu {
        border: 2px solid black;
        border-radius: 20px;
        /* margin: 40px 40px; */
        padding: 20px;
        background: url("css/bg4.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .tt{
        text-align: center;
        font-family: 'Cookie', cursive;
        padding: 60px;
        font-size: 4rem;
        background-color: rgba(231, 163, 36, 0.521);
        margin-bottom:0px;
    }
    </style>
    <title>MENU</title>
</head>

<body>
    <?php require'partials/_nav.php' ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="css/bg1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="height:100px ;">
                    <h5 class="headbg">"The secret of success in life is to eat what you like and let the food fight it
                        out inside”</h5>
                    <p>Mark Twain.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="css/bg2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="headbg">"Your diet is a bank account. Good food choices are good investments" </h5>
                    <p>Bethenny Frankel.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="css/bg3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="headbg">"Spaghetti can be eaten most successfully if you inhale it like a vacuum cleaner”
                    </h5>
                    <p>Sophia Loren.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="containermy-3">
        <h1 class="tt">Welcome To MyOnlineMeal</h1>
        <div class="menu row">
            <?php
            $sql="SELECT * FROM `foodlist` WHERE options='ENABLE'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
            
            echo '<div class="col-md-3 my-4">
                <form method="post" action="cart.php?action=add&id=' . $row["food_id"] . '">
                  <div class="item">
                <img src="' . $row["img_path"] . '" class="img-responsive hh" /><br />
                <p class="h">'. $row["food_name"].'</p>
                <p class="food_desc">' . substr($row["food_desc"],0,70) .'</p>
                <p class="food_pr">&#8377 ' . $row["food_price"] .'</p>
                <p><input type="number"  name="quantity" min="0" max="15"></p>
                <input type="hidden" name="hidden_name" value="' . $row["food_name"]. '">
            <input type="hidden" name="hidden_price" value="' .$row["food_price"]. '"><input type="submit"
                value="Add" name="add">

        </div>
        </form>
    </div>';}?>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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