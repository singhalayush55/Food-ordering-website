<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';
$username=$_SESSION['username'];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYORDERS</title>
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

	$select4="select order_date,sum(food_price*food_qty) as payment from orders where username='$username' group by order_date desc";
	
    $result4=mysqli_query($conn,$select4);
    
	
	while($row4=mysqli_fetch_array($result4))
	{

?>
	
<table style="width:100%; border:solid 2px #000;" class="orders">
	<tr style="background-color:#CCCCCC; height:80px;">
		<td rowspan="4"><strong><?php $d=date_create($row4['order_date']); echo date_format($d,"d-m-Y");  ?></strong></td>
		<td rowspan="4">TOTAL PAYMENT</td>
		<td colspan="3"><strong><?php echo $row4['payment'];?></strong></td>
		<td><a href="my_orders_2.php?dt=<?php echo $row4['order_date']; ?>"><button>VIEW DETAILS</button></a></td>
	</tr>
	
</table>
<br><br>

<?php
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