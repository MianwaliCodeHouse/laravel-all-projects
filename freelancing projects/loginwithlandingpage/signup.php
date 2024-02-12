<?php
session_start();
include "db.php";
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $query = "select email from registered where email='$email'";
    $rquery = mysqli_query($db, $query);
    if (mysqli_num_rows($rquery) > 0) {
        # code...
        echo "<script>alert('Acount already exist through $email.')</script>";
    } else {
        $query = "INSERT INTO `registered` (`fname`, `lname`, `email`, `password`, `date`) VALUES ('$fname', '$lname', '$email', '$pwd', current_timestamp());";
        $rquery = mysqli_query($db, $query);
        echo "<script>alert('Your acount is created through  $email.')</script>";
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
        <?php include "main/head.php" ?>
        <main>
            <form action="signup.php" method="POST" onsubmit="return validation();">
                <div class="one"></div>
                <h1>SignUP form</h1>
                <input type="text" placeholder="Enter First Name" name="fname" required>
                <input type="text" placeholder="Enter Second Name" name="lname" required>
                <input type="number" placeholder="Enter phone number" name="phone" required>
                <input type="email" placeholder="Enter email" name="email" required>
                <input type="password" name="pwd" id="pwd" placeholder="Enter the password" required>
                <input type="password" name="cpwd" id="cpwd" placeholder="Confirm the password" required>
                <p class="message"></p>
                <input type="submit" value="SignUP" name="submit" class="btn">
            </form>
        </main>
        <?php include "main/foot.php" ?>
    </div>
</body>
<script>
    function validation() {
        let var1 = document.querySelector("#pwd")
        let var2 = document.querySelector("#cpwd")
        if (var1.value && var2.value) {
            if (var1.value == var2.value) {
                document.querySelector(".message").innerHTML="correct";
                return true
            } else {
                document.querySelector(".message").innerHTML="passwords not equals";
                return false
            }
        } else {
            document.querySelector(".message").innerHTML="passwords are empty";
            return false
        }
    }
</script>

</html>