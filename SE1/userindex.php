<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineFoodDelivery</title>
    <!-- <link rel="stylesheet" href="./style2.css"> -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- <link rel="stylesheet" href="css/style4.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    .ss{
        display:flex;
    }
    </style>
    <!-- <link rel="stylesheet" media="screen and (max-width : 1156px)" href="css/phone.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai+2|Bree+Serif&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php require'partials/_nav.php' ?>

    <section id="home" class="home">
        <h1 class="h-primary">Welcome To Online Food Delievery</h1>
        <p>My Online Meal showcases inventive World cuisine by complementing the flavours and traditions of India with global ingredients and techniques.</p>
        <p> My Online Meal has been featured in the World's 50 Best Website 2019. </p>
        <a  href="foodlist.php"class="btn btn-danger">Order now</a>
    </section>

    <section class="services-container">
        <h1 class="h-primary center">Our Services</h1>
        <div id="services">
            <div class="box">
                <img src="img/pizza-3007395_1920.jpg" alt="">
                <h2 class="h-secondary center">Food Ordering</h2>
                <p class="center">Order food from favourite your restaurant. Order in for yourself or for the group, with no restrictions on order value. Experience our superfast delivery for food delivered fresh & on time.</p>
            </div>
            <div class="box">
                <img src="img/salad-2068220_1920.jpg" alt="">
                <h2 class="h-secondary center">Food Catering</h2>
                <p class="center">From family reunions and corporate workshops to civic events and weddings, we provide diverse menu offerings according to your needs. Food is often the pinnacle of a party, so we completely look into it and provide the quality you look for and make your big day a content one.</p>
            </div>
            <div class="box">
                <img src="img/d.jpg" alt="">
                <h2 class="h-secondary center">Bulk Ordering</h2>
                <p class="center">Order bulk food online from MyOnlineMeal for your travel group food requirements at Train, Airport or Bus and also parties. We provide in bulk order for all budgets and pricing .It includes all the type of cuisines, guest count, menu spread and services required .p>
            </div>
        </div>
    </section>

    <section id="client-section" >
        <h1 class="h-primary center">Our Clients</h1>
        <div id="clients">
            <div class="client-item">
                <img src="img/logo1.png" alt="">
            </div>
            <div class="client-item">
                <img src="img/HP_logo_630x630.png" alt="">
            </div>
            <div class="client-item">
                <img src="img/skype-for-business-videotelephony-telephone-call-microsoft-skype-thumbnail.jpg" alt="">
            </div>
        </div>
    </section>
    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
        <div id="contact-box">
            <form action="">
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="name " placeholder="Enter yout name: ">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="name" id="email " placeholder="Enter yout email: ">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number :</label>
                    <input type="phone" name="name" id="phone " placeholder="Enter yout number: ">
                </div>
                <div class="form-group">
                    <label for="name">Message :</label>
                    <!-- <input type="text" name="name" id="name " placeholder="Enter yout name: "> -->
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="center">
            Copyright &copy; www.MyOnlineMeal.com. All rights reserved!
        </div>
    </footer>
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