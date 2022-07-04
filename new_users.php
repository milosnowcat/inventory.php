<!-- RAH Code -->

<?php
include('session.php');

if($start == 1){

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomPassword1 = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $randomPassword1[] = $alphabet[$n];
        }
        return implode($randomPassword1); //turn the array into a string
    }
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
        <label>Password: </label><input type="text" name="pass" id="pass" value="<?php echo randomPassword() ?>"><br><br>
        <label>Admin: </label>
        <br>
        <input type="radio" name="admin" id="admin" value="0" checked>
        <label for="0">No</label>
        <br>
        <input type="radio" name="admin" id="admin" value="1">
        <label for="1">Yes</label>
        <br><br>
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