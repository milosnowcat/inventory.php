<!-- RAH Code -->

<?php
include('session.php');

if($start == 1){

$type = $_POST['type'];
$model = $_POST['model'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];

mysqli_query($conn,"INSERT INTO `products` (`type`, `model`, `quantity`, `cost`) VALUES ('".$type."','".$model."','".$quantity."','".$cost."')");
header('Location: inventory.php');

}elseif($start == 2){
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
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