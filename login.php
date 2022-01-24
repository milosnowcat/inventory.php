<?php
include('conn.php');

$user = $_POST["txtuser"];
$pass = $_POST["txtpass"];

$query = mysqli_query($conn,"SELECT `user`, `pass` FROM `users` WHERE user='$user' AND pass='$pass'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
    
    $cookie_name = "user";
    $cookie_value = $user;
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
            <div id="footer"></div>
    </center>

    <script src="https://www.rahcode.com/footer.js"></script>
</body>
</html>