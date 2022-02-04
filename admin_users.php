<?php
$adminEdit = 0;
$adminShow = 0;

if($_GET['id'] == 1 || $_GET['id'] == 2){
    /* ID 1 and 2 are for super users, you can
    add admins in the database, admins can edit,
    delete and add products and users, but no one
    can edit super users (not even them) */
    $adminEdit = 1;
}

if($adminEdit == 1){
    echo "<script> alert('You cannot edit this user');window.location= 'users.php' </script>";
}
?>