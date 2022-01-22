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
    <title>db</title>
</head>
<body>
    <h3><a href="new.php">Add a product</a></h3>

    <h3>Search</h3>
    <form action="db.php" method="post">
        <input type="search" name="stringSearch" id="stringSearch">
        <input type="submit" name="search" id="search" value="Search">
    </form>
    <br>
    <h3>Cantidad</h3>
    <a href="?quantity=0">0</a>
    <a href="?quantity=1">1</a>
    <a href="db.php">all</a>

    <br>
    <br>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Model</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Options</th>
        </tr>

        <?php
        if(isset($_GET['quantity'])){
            $id = $_GET['quantity'];
            $sql = "SELECT * FROM products WHERE quantity = ".$id."";
        }
        else{
            $sql = "SELECT * FROM products ";
        }
        
        

        // Search

        if(isset($_POST['search'])){
            
            $search = $_POST['stringSearch'];

            if($_POST['stringSearch'] == ''){
                $sql = "SELECT * FROM products";
            }else{
                $sql .= "WHERE (type LIKE LOWER ('%$search%') OR model LIKE LOWER ('%$search%'))";
                }

            }

        // Search

        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                $edit = "edit.php?id=" . $row['id'];
                $delete = "delete.php?id=" . $row['id'];
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["type"] . "</td><td>" . $row["model"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["cost"] . "</td><td>" . "<a href=$edit>Edit</a> " . " <a href=$delete>Delete</a>" . "</td></tr>";
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