<?php
session_start();
$loggedin=true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
include 'partials/_dbconnect.php';



$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$description = $conn->real_escape_string($_POST['description']);




$images_path = $conn->real_escape_string($_POST['images_path']);

$query = "INSERT INTO `foodlist` (`food_id`, `food_name`, `food_price`, `food_desc`, `img_path`) VALUES (NULL, '$name', '$price', '$description', '$images_path');";
$success = $conn->query($query);

header('Location: add_food_items.php?success="added"');


$conn->close();


?>