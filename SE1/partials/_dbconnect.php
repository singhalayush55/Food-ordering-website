<?php
$server = "localhost";
$username="root";
$password="";
$datbase="myonlinemeal";

$conn=mysqli_connect( $server,$username,$password,$datbase);
if(!$conn){
    die("Error". mysqli_connect_error());
}
?>
