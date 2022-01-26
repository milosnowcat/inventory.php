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

    <h3>Quantity</h3>
    <a href="?quantity=0">0</a>
    <a href="?quantity=1">1</a>
    <a href="db.php">all</a>

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
            $search_quantity = $_GET['quantity'];
            $sql = "SELECT * FROM products WHERE quantity = ".$search_quantity."";
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

        $quantity_total = 0;
        $cost_total = 0;

        if ($result !== false && $result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){

                $product_id = $row['id'];
                $product_type = $row['type'];
                $product_model = $row['model'];
                $product_quantity = $row['quantity'];
                $product_cost = $row['cost'];

                $quantity_total = $quantity_total + $product_quantity;
                $cost_total = $cost_total + ($product_quantity * $product_cost);

                $product_edit = "edit.php?id=$product_id";
                $product_delete = "delete.php?id=$product_id";
                ?>



                <tr>
                    <td><?php echo $product_id ?></td>
                    <td><?php echo $product_type ?></td>
                    <td><?php echo $product_model ?></td>
                    <td><?php echo $product_quantity ?></td>
                    <td><?php echo $product_cost ?></td>
                    <td>
                        <a href=<?php echo $product_edit ?>>Edit</a>
                        <a href=<?php echo $product_delete ?>>Delete</a>
                    </td>
                </tr>

                <?php
            }
            echo "<p>Total quantity: $quantity_total</p>";
            echo "<p>Total cost: $cost_total</p>";
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
            <div id="footer"></div>
    </center>

    <script src="https://www.rahcode.com/footer.js"></script>
</body>
</html>

<?php

}
?>