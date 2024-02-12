<?php
session_start();
include "../db.php";
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $query = "SELECT * FROM `admin` where email='$email' and pwd='$pwd'";
    $rquery = mysqli_query($db, $query);
    if (mysqli_num_rows($rquery) == 1) {
        echo "<script>alert('You are login through $email.')</script>";
        $_SESSION['login']=$email;
        header("location: index.php");
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
    <title>UOM | Login</title>
    <link rel="shortcut icon" href="../asset/uom-logo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <main>
            <form action="login.php" method="POST">
        <div class="one"></div>
        <h1>Admin Login</h1>
        <input type="email" placeholder="Enter email" name="email">
        <input type="password" name="pwd" id="" placeholder="Enter the password">
        <input type="submit" value="Login" name="submit" class="btn">
            </form>
        </main>
    </div>
</body>
</html>