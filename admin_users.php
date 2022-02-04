<?php
include('superuser.php');

$adminEdit = 0;

if($_GET['id'] == $superuser){
    $adminEdit = 1;
}

if($adminEdit == 1){
    echo "<script> alert('You cannot edit this user');window.location= 'users.php' </script>";
}
?>