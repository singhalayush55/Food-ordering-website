<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';
$cheks = implode("','", $_POST['checkbox']);
$sql = "UPDATE foodlist SET `options` = 'DISABLE' WHERE food_id in ('$cheks')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$conn->close();

header('Location: delete_food_items.php');
?>