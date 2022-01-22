<?php
$dbHost = "";
$dbUser = "";
$dbPass = "";
$dbName = "";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>