<?php
include "db.php";
if (isset($_POST['submit'])) {
    // print_r($_POST);
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $query1="select * from `registration`
    where useremail='$email';";
    $runq1=mysqli_query($db,$query1);
    if (mysqli_num_rows($runq1)>0) {
        echo "<script>alert('Acount already exist through this email')</script>";
    }else{
        $query2="INSERT INTO `registration` ( `fname`, `lname`, `useremail`, `password`, `date`) VALUES ('$fname', '$lname', '$email', '$pwd', current_timestamp());";
        $runq2=mysqli_query($db,$query2);

        echo "<script>alert('Successfully Registered')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUP</title>
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
        <form action="signup.php" method="post">
            <h1>SignUP form</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. . </p>
            <div class="f">
                <label for="">First Name</label><input type="text" name="fname" placeholder="Enter the first name">
            </div>
            <div class="f">
                <label for="">last Name</label><input type="text" name="lname" placeholder="Enter the last name">
            </div>
            <div class="f">
                <label for="">Enter the Email</label>
                <input type="email" name="email" placeholder="Enter the Email">
            </div>
            <div class="f">
                <label for="pwd">Enter the Password</label>
                <input type="password" name="pwd" placeholder="Enter the password">
            </div>
            <div class="f">
                <label for="pwd">Confirm the Password</label>
                <input type="password" name="cpwd" placeholder="Confirm the password">
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