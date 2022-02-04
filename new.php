<!-- RAH Code -->

<?php
include('session.php');

if($start == 1 || $start == 2){

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
    <form action="add.php" method="POST">
        <label>Type (PRODUCT BRAND): </label><input type="text" name="type" id="type"><br><br>
        <label>Model: </label><input type="text" name="model" id="model"><br><br>
        <label>Quantity: </label><input type="number" name="quantity" id="quantity" value="1"><br><br>
        <label>Cost: </label><input type="number" name="cost" id="cost" value="76"><br><br>
        <input type="submit" value="Add" name="add" id="add">
    </form>

    <br>
    <br>
    <a href="inventory.php">Back</a>

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