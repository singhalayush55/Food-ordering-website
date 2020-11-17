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
    <title>ABOUT US</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/aboutus.css">
</head>
<body>
<?php include'partials/_nav.php';?>

<section class="team-section">
     <div class="container">
         <div class="row">
             <div class="section-title">
                 <h1>ABOUT US</h1>
                 <p>MyOnlineMeal has grown from a home project to one of the largest food aggregators in the India. We are present 1000+ cities, enabling our vision of better food for more people. We not only connect people to food in every context but work closely with our dedicated menu to provide people with delicious and quality food.</p>
             </div>
         </div>
         <div class="row">
             <div class="team-items">
                  
                  <div class="item">
                      <img src="img/ayush.PNG" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>AYUSH SINGHAL</h5>
                               <p>Designer</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="img/hriday.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>HRIDHAY V</h5>
                               <p>Designer</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>

            </div>
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