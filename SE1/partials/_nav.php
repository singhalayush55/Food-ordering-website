<style>
@import url('https://fonts.googleapis.com/css?family=Allura|Josefin+Sans');
nav{
  font-family: 'Josefin Sans', sans-serif;
}</style>

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin=true;
}
else{
  $loggedin=false;
}


echo'<nav class="navbar navbar-expand-sm navbar-light bg-light ">
  <a class="navbar-brand " href="#">MyOnlineMeal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/SE1/userindex2.php">Home <span class="sr-only">(current)</span></a>
      </li>';
      if(!$loggedin){
        echo'<li class="nav-item">
        <a class="nav-link" href="/SE1/index.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/SE1/signup.php">Signup</a>
      </li>';}
      if($loggedin){
      echo'
    <li class="nav-item">
      <a class="nav-link" href="aboutus.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contactus.php">Contact Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="services.php">Services</a>
    </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <p class="text-dark my-2 mx-2 icc">Welcome ' .$_SESSION['username']. '</p>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cart
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/SE1/cart.php">Cart</a>
        <a class="dropdown-item" href="/SE1/my_order.php">MyOrders</a>
        <a class="dropdown-item" href="/SE1/profile.php">Profile</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link ml-auto icc" href="/SE1/logout.php">LogOut</a>
      </li>';}

    echo'</ul>
  </div>
</nav>';
?>