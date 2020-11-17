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
    <style>
    
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contactus.css">
</head>

<body style="background-color: #bcc393ab;">
<?php include'partials/_dbconnect.php';?>
    <?php include'partials/_nav.php';?>
    
    <div id="succ"></div>

  <?php
    $showAlert= false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //insert thread into comment DB
        $name=$_POST['txtName'];
        $email=$_POST['txtEmail'];
        $phone=$_POST['txtPhone'];
        $desc=$_POST['txtMsg'];
        $sql="INSERT INTO `contactus` (`name`, `email`, `phone`, `prb_desc`) VALUES ('$name', '$email', '$phone', '$desc');";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Response has been Posted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>


    <div class="container">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    WE WOULD LOVE TO HEAR FROM YOU
                </p>

                <div class="info">
                    <div class="information">
                        <img src="img/maps.jpeg" class="icon" alt="" />
                        <p>92 Cherry Drive Uniondale, NY 11553</p>
                    </div>
                    <div class="information">
                        <img src="img/mail.jpeg" class="icon" alt="" />
                        <p>myonlinemeal@gmail.com</p>
                    </div>
                    <div class="information">
                        <img src="img/phone.jpeg" class="icon" alt="" />
                        <p>123-456-789</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="contactus.php" method="POST" autocomplete="off" onsubmit="return formSubmit()" id="fbox">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input placeholder="Name" type="text" name="txtName" class="input" />
                        <label for=""></label>
                        <!-- <span>Nname</span> -->
                    </div>
                    <div class="input-container">
                        <input placeholder="Email" type="email" name="txtEmail" class="input" />
                      
                    
                    </div>
                    <div class="input-container">
                        <input placeholder="Phone" type="tel" name="txtPhone" class="input" />
                     
                        
                    </div>
                    <div class="input-container textarea">
                        <textarea placeholder="Message" name="txtMsg" class="input"></textarea>
                        
                        
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>






    <script>
      function formSubmit(){
        $.ajax({
          type:'POST',
          url:'contactus.php',
          data:$('fbox').serialize(),
          success:function(response){
            $('#succ').html(response);

          }
        });
        var form=document.getElementById('fbox').reset();
        return false;
      }
    </script>


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