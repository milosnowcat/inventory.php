<?php
include('session.php');

if($start == 1 || $start == 2){

$id=$_GET['id'];

$type=$_POST['type'];
$model=$_POST['model'];
$quantity=$_POST['quantity'];
$cost=$_POST['cost'];

mysqli_query($conn,"UPDATE `products` SET `type`='$type',`model`='$model',`quantity`='$quantity',`cost`='$cost' WHERE id = '$id'");
header('Location: inventory.php');

}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>
