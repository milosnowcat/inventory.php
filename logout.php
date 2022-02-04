<?php
    $cookie_name = "user";
    $cookie_value = '';
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
    
    $cookie_name = "pass";
    $cookie_value = '';
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");

    echo "<script> alert('Good bye!');window.location= 'index.php' </script>";
?>