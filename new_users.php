<!-- RAH Code -->

<?php
include('session.php');

if($start == 1){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new</title>
</head>
<body>
    <h3>Add</h3>
    <form action="add_users.php" method="POST">
        <label>Username: </label><input type="text" name="user" id="user"><br><br>
        <label>Password: </label><input type="text" name="pass" id="pass"><br><br>
        <label>Admin: </label><input type="number" name="admin" id="admin" value="0"><br><br>
        <input type="submit" value="Add" name="add" id="add">
    </form>

    <br>
    <br>
    <a href="users.php">Back</a>

<?php
}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>

    <center>
            Developed by Ramiro Alvarez Hernández
            <br>
            <div id="footer"></div>
    </center>

    <script src="https://www.rahcode.com/footer.js"></script>
    </body>
    </html>