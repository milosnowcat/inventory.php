<?php
include('session.php');
include('admin_users.php');

if($start == 1){

$id=$_GET['id'];
$query=mysqli_query($conn,"SELECT * FROM `users` WHERE id = '$id'");
$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>

    <h2>Edit</h2>
    <form method="POST" action="update_users.php?id=<?php echo $id; ?>">
    <label>Username:</label><input type="text" value="<?php echo $row['user']; ?>" name="user">
    <br>
    <br>
    <label>Password:</label><input type="text" value="<?php echo $row['pass']; ?>" name="pass">
    <br>
    <br>
    <label>Admin:</label><input type="number" value="<?php echo $row['admin']; ?>" name="admin">
    <p>0 = No</p>
    <p>1 = Yes</p>
    <br>
    <input type="submit" value="Edit">
    <br>
    <br>
    <a href="users.php">Back</a>
    </form>

    <center>
            Developed by Ramiro Alvarez Hernández
            <br>
            <div id="footer"></div>
    </center>

    <script src="https://www.rahcode.com/footer.js"></script>
</body>
</html>

<?php

}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>