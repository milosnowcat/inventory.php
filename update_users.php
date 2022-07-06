<?php
include('session.php');
include('admin_users.php');

if($start == 1){

$id=$_GET['id'];

$db_user=$_POST['user'];
$db_pass=$_POST['pass'];
$db_admin=$_POST['admin'];

if ($db_admin < 0){
    $db_admin = 0;
}

if ($db_admin > 1){
    $db_admin = 1;
}

mysqli_query($conn,"UPDATE `users` SET `user`='$db_user',`pass`='$db_pass',`admin`='$db_admin' WHERE id = '$id'");
header('Location: users.php');

}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>
