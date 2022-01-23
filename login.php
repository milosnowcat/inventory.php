<?php
include('conn.php');

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT `user`, `pass` FROM `users` WHERE user='$nombre' AND pass='$pass'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
    
    $cookie_name = "user";
    $cookie_value = $nombre;
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
    
    $cookie_name = "pass";
    $cookie_value = $pass;
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
    
	header("Location: db.php");
}
else if ($nr == 0) 
{
	echo "<script> alert('Error');window.location= 'index.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <center>
        Developed by Ramiro Alvarez Hernández
        <br>
        <iframe src="https://www.rahcode.com/footer.html" frameborder="0" width="100%" height="100%"></iframe>
    </center>
</body>
</html>