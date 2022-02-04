<!-- RAH Code -->

<?php
include('conn.php');

$start = 0;

if(!isset($_COOKIE['user']) || !isset($_COOKIE['pass']) || ($_COOKIE['user']=='') || ($_COOKIE['pass']=='')){
    header("Location: index.php");
  }
  else{
    $user = $_COOKIE["user"];
    $pass = $_COOKIE["pass"];

    $query = mysqli_query($conn,"SELECT `user`, `pass` FROM `users` WHERE user='$user' AND pass='$pass'");
    $nr = mysqli_num_rows($query);


    if ($nr == 1){
        $start = 2;

        $query2 = mysqli_query($conn,"SELECT `admin` FROM `users` WHERE user = '$user'");
        $row=mysqli_fetch_array($query2);

        if ($row['admin'] == true){
            $start = 1;
        }
    }
    else if ($nr == 0){
        $cookie_name = "user";
        $cookie_value = '';
        setcookie($cookie_name, $cookie_value, time() + (86400), "/");
        
        $cookie_name = "pass";
        $cookie_value = '';
        setcookie($cookie_name, $cookie_value, time() + (86400), "/");

        echo "<script> alert('Please login first');window.location= 'index.php' </script>";
    }
}
?>