<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';
$username=$_SESSION['username'];
// echo $username;
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    td {
        text-align: center;
        padding: 15px;
        font-size: 18px;
        border: solid 2px #666666;
    }

    tr {
        border: solid 2px #666666;
    }
    </style>
</head>

<body>
    <?php include 'partials/_nav.php';?>

    <body style="background-color:#111;">   

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">MY ORDERS</h2><center><font face="Geneva" size="+2" color="#006600">Here are your previous orders!</font></center></div>

<div style="width:95%; margin:2.5%; ">

<?php
  $sql="select order_date,sum(price*quantity) as payment from orders where username='user1' group by order_date desc";
	// $sql="SELE order_date,sum(price*quantity) as payment from `orders` where username='user1' group by order_date des";
	
	$result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result))
	{

    echo 'Success';
	}
?>

</div>













    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

<script>

$(".more").click(function(){
	$(this).closest('.orders').find('.display').toggle(1000);
})



</script>

</html>