<?php
include('conn.php');
include('superuser.php');
include('session.php');

$user = $_POST["txtuser"];
$pass = $_POST["txtpass"];

$query = mysqli_query($conn,"SELECT * FROM `users` WHERE user='$user' AND pass='$pass'");
$nr = mysqli_num_rows($query);
$row=mysqli_fetch_array($query);

if($nr == 1)
{
    $_SESSION["start"] = 3;

    session_start();

    $_SESSION["user"]=$user;
    $_SESSION["pass"]=$pass;

    if ($row['admin'] == true){
        $_SESSION["start"] = 2;

        if ($row['id'] == $superuser){
            $_SESSION["start"] = 1;
        }
    }

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