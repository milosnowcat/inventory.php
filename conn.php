<!-- RAH Code -->

<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "inventory_rahcode";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
?>