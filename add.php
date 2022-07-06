<?php
include('session.php');

if($start == 1 || $start == 2){

$type = $_POST['type'];
$model = $_POST['model'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];

mysqli_query($conn,"INSERT INTO `products` (`type`, `model`, `quantity`, `cost`) VALUES ('".$type."','".$model."','".$quantity."','".$cost."')");
header('Location: inventory.php');

}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>
