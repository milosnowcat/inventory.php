<?php
include('session.php');

if($start == 1){

$id=$_GET['id'];

$type=$_POST['type'];
$model=$_POST['model'];
$quantity=$_POST['quantity'];
$cost=$_POST['cost'];

mysqli_query($conn,"UPDATE `products` SET `type`='$type',`model`='$model',`quantity`='$quantity',`cost`='$cost' WHERE id = '$id'");
header('location:db.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <center>
        Developed by Ramiro Alvarez Hernández
        <br>
        <iframe src="https://www.rahcode.com/footer.html" frameborder="0" width="100%" height="100%"></iframe>
    </center>
</body>
</html>