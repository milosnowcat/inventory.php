<?php
include('session.php');

if($start == 1){

    $id=$_GET['id'];

    echo "<h3>Are you sure you want to remove this product?</h3>";
    echo '<a href="?id='. $id .'&action=yes">Yes</a>';
    echo "<br>";
    echo "<br>";
    echo '<a href="?id='. $id .'&action=no">No</a>';


    if(isset($_GET['action'])){

        $action=$_GET['action'];

        if($action=='yes'){
            mysqli_query($conn,"DELETE FROM `products` WHERE id = '$id'");
            header('Location: db.php');
        }elseif($action=='no'){
            header('Location: db.php');
        }
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
            <div id="footer"></div>
    </center>

    <script src="https://www.rahcode.com/footer.js"></script>
</body>
</html>