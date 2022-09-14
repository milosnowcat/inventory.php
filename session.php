<?php
include('conn.php');
include('superuser.php');

session_start();

if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){
    header("Location: index.php");
} else {
    $user=$_SESSION['user'];
    $start=$_SESSION["start"];
}
?>