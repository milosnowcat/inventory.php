<!-- RAH Code -->

<?php
include('session.php');

if($start == 1){

$id=$_GET['id'];
$query=mysqli_query($conn,"SELECT `id`, `type`, `model`, `quantity`, `cost` FROM `products` WHERE id = '$id'");
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
    <form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label>Type:</label><input type="text" value="<?php echo $row['type']; ?>" name="type">
    <br>
    <label>Model:</label><input type="text" value="<?php echo $row['model']; ?>" name="model">
    <br>
    <label>Quantity:</label><input type="number" value="<?php echo $row['quantity']; ?>" name="quantity">
    <br>
    <label>Cost:</label><input type="number" value="<?php echo $row['cost']; ?>" name="cost">
    <br>
    <input type="submit" value="Edit">
    <br>
    <br>
    <a href="db.php">Back</a>
    </form>

    <center>
        Developed by Ramiro Alvarez Hernández
        <br>
        <iframe src="https://www.rahcode.com/footer.html" frameborder="0" width="100%" height="100%"></iframe>
    </center>
</body>
</html>

<?php

}
?>