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

    date_default_timezone_set("America/Mexico_City");
    $currentDate = date('Y-m-d');

    mysqli_query($conn,"UPDATE `users` SET `date`='$currentDate' WHERE user='$user'");
    
	header("Location: inventory.php");
}
else if ($nr == 0) 
{
	echo "<script> alert('Error');window.location= 'index.php' </script>";
}
?>