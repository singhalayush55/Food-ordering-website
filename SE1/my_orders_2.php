<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';
$username=$_SESSION['username'];
$dt=$_REQUEST['dt'];
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

    .dt{
        color:white;
    }
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

<body style="background-color:#111;"> 
    <?php include 'partials/_nav.php';?>
    <div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">MY ORDERS</h2><center><font face="Geneva" size="+2" color="#006600">Here are your previous orders!</font></center></div>

<div style="width:95%; margin:2.5%; ">

<h1 class="dt"><?php echo $dt;  ?></h1>

<?php

	
	
	$sql="select * from orders where username='$username' and order_date='$dt'";
	
	$result=mysqli_query($conn,$sql);	
	
	while($row=mysqli_fetch_array($result))
	{
        $food_id=$row['food_id'];
        $sql2="SELECT * FROM `foodlist` WHERE `food_id` = $food_id";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($result2);
        // echo $row2['img_path']; 


?>
	
<table style="width:100%; border:solid 2px #000;" class="orders">
	
	<tr style="background-color:#CCCCCC; height:80px;">
		<td rowspan="4"><img src="<?php echo $row2['img_path']; ?>" style="height:150px; width:130px;"></td>
		<td colspan="3"><strong><?php echo $row['food_name']; ?></strong></td>
	</tr>
	<tr style="background-color:#CCCCCC; height:80px;">
		<td><strong>PRICE</strong></td>
		<td><strong>QUANTITY</strong></td>
		<td><strong>TOTAL</strong></td>
	</tr>
	<tr style="background-color:#CCCCCC; height:80px;">
		<td><strong><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $row['food_price']; ?></strong></td>
		<td><strong><?php echo $row['food_qty']; ?></strong></td>
		<td><strong><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo ($row['food_price']*$row['food_qty']) ?></strong></td>
	</tr>
	<tr style="background-color:#999999; height:60px;" class="more">
		<td colspan="3"><strong>More details&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></strong></td>
	</tr>
	<tr class="display" style="display:none;">
		<td colspan="3"><div><h3>PERSONAL DETAILS</h3><br><label>USER NAME:</label><?php echo $row['username']; ?></div></td>
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

      