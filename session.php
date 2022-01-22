<?php
include('conn.php');

$start = 0;

if(!isset($_COOKIE['user']) || !isset($_COOKIE['pass'])){
    header("Location: index.php");
  }
  else{
    $user = $_COOKIE["user"];
    $pass = $_COOKIE["pass"];

    $query = mysqli_query($conn,"SELECT `user`, `pass` FROM `users` WHERE user='$user' AND pass='$pass'");
    $nr = mysqli_num_rows($query);


    if ($nr == 1){
        $start = 1;
    }
    else if ($nr == 0){
        //header("Location: login.html");
        //echo "No ingreso"; 
        echo "<script> alert('Error');window.location= 'index.php' </script>";
    }
}
?>