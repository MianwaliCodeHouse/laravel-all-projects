<?php
session_start();
include "db.php";
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $query = "select email,password from registered where email='$email' && password='$pwd'";
    $rquery = mysqli_query($db, $query);
    if (mysqli_num_rows($rquery) == 1) {
        # code...
        echo "<script>alert('You are login through $email.')</script>";
        $_SESSION['login']=$email;
    } else{
        echo "<script>alert('We found no acount through $email.')</script>";

        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="main/style.css">
    <link rel="stylesheet" href="main/login.css">
</head>
<body>
    <div class="container">
        <?php include "main/head.php";?>
        <main>
            <form action="login.php" method="POST">
        <div class="one"></div>
        <h1>login form</h1>
        <input type="email" placeholder="Enter email" name="email">
        <input type="password" name="pwd" id="" placeholder="Enter the password">
        <input type="submit" value="Login" name="submit" class="btn">
            </form>
        </main>
        <?php include "main/foot.php"?>
    </div>
</body>
</html>