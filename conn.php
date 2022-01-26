<!-- RAH Code -->

<?php
$dbHost = "";
$dbUser = "";
$dbPass = "";
$dbName = "";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
?>