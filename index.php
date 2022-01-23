<!-- RAH Code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>

    <form method="post" action="login.php">
    <h3>Login</h3>
    <label>User:</label>
    <br>
    <input type="text" name="txtuser"/>
    <br>
    <br>
    <label>Password:</label>
    <br>
    <input type="password" name="txtpass" />
    <br>
    <br>
    <input type="submit" value="Login" />
    </form>

    <center>
        Developed by Ramiro Alvarez Hernández
        <br>
        <iframe src="https://www.rahcode.com/footer.html" frameborder="0" width="100%" height="100%"></iframe>
    </center>
</body>
</html>

<?php
    if(isset($_COOKIE['user']){
        header("Location: db.php");
    }
?>