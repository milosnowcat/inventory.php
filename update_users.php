<!-- RAH Code -->

<?php
include('session.php');
include('admin_users.php');

if($start == 1){

$id=$_GET['id'];

$db_user=$_POST['user'];
$db_pass=$_POST['pass'];
$db_admin=$_POST['admin'];

mysqli_query($conn,"UPDATE `users` SET `user`='$db_user',`pass`='$db_pass',`admin`='$db_admin' WHERE id = '$id'");
header('Location: users.php');

}elseif($start == 2){
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
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