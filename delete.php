<?php
include('session.php');

if($start == 1){

    $id=$_GET['id'];
    $action=$_GET['action'];

    echo "<h3>Are you sure you want to remove this product?</h3>";
    echo '<a href="?id='. $id .'&&action=yes">Yes</a>';
    echo "<br>";
    echo '<a href="?id='. $id .'&&action=no">No</a>';

    if($action='yes'){
        mysqli_query($conn,"DELETE FROM `products` WHERE id = '$id'");
        header('location:db.php');
    }elseif($action='no'){
        header('location:db.php');
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>
<body>
    <center>
        Developed by Ramiro Alvarez Hernández
        <br>
        <iframe src="https://www.rahcode.com/footer.html" frameborder="0" width="100%" height="100%"></iframe>
    </center>
</body>
</html>