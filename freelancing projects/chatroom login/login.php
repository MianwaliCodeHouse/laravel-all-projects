<?php
include "db.php";
session_start();
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $query1="select useremail,password from registration where useremail='$email' && password='$pwd'";
    $rq1=mysqli_query($db,$query1);
    echo mysqli_num_rows($rq1);
    if (mysqli_num_rows($rq1)>0) {
        echo "<script>alert('Successfully login')</script>";
        $_SESSION['login']=$_POST['email'];
    }else{
        echo "<script>alert('you entered the wrong details')</script>";
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
    <style>
        *{
            font-family: system-ui;

        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95vh;
        }
        .container p{
            text-align: center;
            margin: 0.5rem 0;
        }
        form{
            width: 400px;
            box-shadow: 1px 1px 20px 1px rgba(0, 0, 0, 0.3);
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form .f{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        form .f input{
            padding: 0.5rem;
            width: 230px;
        }
        form .btn input{
            background-color: black;
            color: white;
            border-radius: 0.5rem;
            padding: 1rem;
            font-size: larger;
            cursor: pointer;
        }
    
        nav{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            color: white;
        }
        nav ul{
            display: flex;
            width: 60%;
            align-items: center;
            justify-content: center;
            list-style: none;
        }
        nav ul li{
            padding: 1rem;
        }
        nav .btn a{
            text-decoration: none;
            padding: 1rem;
            background-color: gray;
            color: white;
            border-radius: 1rem;
            margin: 1rem;
        }
        footer{
            text-align: center;
            background-color: black;
            color: white;
        }
        footer h3{
            padding: 2rem;
        } 
    </style>
</head>
<body>
<nav>
        <ul>
            <li><a href="index.php"> Home</a></li>
            <li>About</li>
            <li>Contact</li>
        </ul>
        <div class="btn">
            <?php if(isset($_SESSION['login'])){
                ?>
                <a href="logout.php">Logout</a>
                <?php
            }else{
                ?>
                <a href="login.php">Login</a>
                <a href="signup.php">SignUP</a>
                <?php
            } ?>
        </div>
    </nav>
    <div class="container">
        <form action="login.php" method="post">
            <h1>Login form</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel nobis voluptatum itaque corrupti pariatur ipsum, quaerat nostrum minus consequuntur eius eligendi. </p>
            <div class="f">
                <label for="">Enter the Email</label>
                <input type="email" name="email" placeholder="Enter the Email">
            </div>
            <div class="f">
                <label for="pwd">Enter the Password</label>
                <input type="password" name="pwd" placeholder="Enter the password">
            </div>
            <div class="btn">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    <footer>
        <h3>Created by Muhammad Yasir Hussain</h3>
    </footer>
</body>
</html>