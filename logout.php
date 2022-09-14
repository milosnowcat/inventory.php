<?php
    session_start();

    session_unset();

    echo "<script> alert('Good bye!');window.location= 'index.php' </script>";
?>