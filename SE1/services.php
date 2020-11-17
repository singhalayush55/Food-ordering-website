<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/services.css">
</head>

<body>
    <?php include'partials/_nav.php';?>

    <section class="section-services">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-md-10 col-lg-8">
					<div class="header-section">
						<h2 class="title">Exclusive Services</h2>
						<p class="description">SIMPLE RESTAURANT SOLUTION FOR ALL KIND OF ORDERS.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Single Service -->
				<div class="col-md-6 col-lg-4">
					<div class="single-service">
						<div class="content">
							<span class="icon">
								<i class="fab fa-battle-net"></i>
							</span>
							<h3 class="title">FOOD ORDERING</h3>
							<p class="description">Order food from favourite your restaurant. Order in for yourself or for the group, with no restrictions on order value. Experience our superfast delivery for food delivered fresh & on time.</p>
							<a href="#" class="learn-more">Learn More</a>
						</div>
						<span class="circle-before"></span>
					</div>
				</div>
				<!-- / End Single Service -->
				<!-- Single Service -->
				<div class="col-md-6 col-lg-4">
					<div class="single-service">
						<div class="content">
							<span class="icon">
								<i class="fab fa-asymmetrik"></i>
							</span>
							<h3 class="title">FOOD CATERING </h3>
							<p class="description">From family reunions and corporate workshops to civic events and weddings, we provide diverse menu offerings according to your needs. Food is often the pinnacle of a party, so we completely look into it and provide the quality you look for and make your big day a content one..</p>
							<a href="#" class="learn-more">Learn More</a>
						</div>
						<span class="circle-before"></span>
					</div>
				</div>
				<!-- / End Single Service -->
				<!-- Single Service -->
				<div class="col-md-6 col-lg-4">
					<div class="single-service">
						<div class="content">
							<span class="icon">
								<i class="fab fa-artstation"></i>
							</span>
							<h3 class="title">BULK ORDERING</h3>
							<p class="description">Order bulk food online from MyOnlineMeal for your travel group food requirements at Train, Airport or Bus and also parties. We provide in bulk order for all budgets and pricing .It includes all the type of cuisines, guest count, menu spread and services required .</p>
							<a href="#" class="learn-more">Learn More</a>
						</div>
						<span class="circle-before"></span>
					</div>
				</div>
				<!-- / End Single Service -->
				
				<!-- / End Single Service -->
			</div>
		</div>
	</section>
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