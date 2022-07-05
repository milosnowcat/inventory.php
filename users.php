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
    <title>users</title>
</head>
<body>
    <h3><a href="new_users.php">Add a user</a></h3>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Admin</th>
            <th>Options</th>
        </tr>

        <?php
        $sql = "SELECT * FROM users";

        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){

                $db_id = $row['id'];
                $db_user = $row['user'];
                $db_pass = $row['pass'];
                $db_admin = $row['admin'];

                $product_edit = "edit_users.php?id=$db_id";
                $product_delete = "delete_users.php?id=$db_id";

                if($db_id == $superuser){
                }else{
                    ?>



                    <tr>
                        <td><?php echo $db_id ?></td>
                        <td><?php echo $db_user ?></td>
                        <td><?php echo $db_pass ?></td>
                        <td><?php echo $db_admin ?></td>
                        <td>
                            <a href=<?php echo $product_edit ?>>Edit</a>
                            <a href=<?php echo $product_delete ?>>Delete</a>
                        </td>
                    </tr>

                    <?php
                }
            }
        }
        else{
            echo "No Results";
        }
        $conn->close();
        ?>

    </table>

    <br>
    <br>
    
    <a href="inventory.php">Back</a>

    <br>
    <br>
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