<!-- RAH Code -->

<?php
include('session.php');

if($start == 1){

$db_user = $_POST['user'];
$db_pass = $_POST['pass'];
$db_admin = $_POST['admin'];

mysqli_query($conn,"INSERT INTO `users` (`user`, `pass`, `admin`) VALUES ('".$db_user."','".$db_pass."','".$db_admin."')");
header('Location: users.php');

}else{
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