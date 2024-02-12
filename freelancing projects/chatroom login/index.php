<?php
session_start();
include "db.php";
if (isset($_POST['submit'])) {
    if (isset($_SESSION['login'])) {
        $email=$_SESSION['login'];
        $msg=$_POST['msg'];
        $qq="INSERT INTO `cs` (`comment`, `email`, `date`) VALUES ('$msg', '$email', current_timestamp());";
        $rqq=mysqli_query($db,$qq);

    }else{
        echo "<script>alert('you cannot comment , if you are not login')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatroom</title>
    <style>
        .comments{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 1rem;
            
        }
        .comments .c{
            background-color: lightskyblue;
            padding: 1rem;
            /* width: 270px; */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        .comments .c .circle{
            height: 50px;
            width: 50px;
            background-color: lightgray;
            border-radius: 50%;
            margin-right: 1rem;
        }
        *{
            font-family: system-ui;
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
        main{
            
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        main .center{
            width: 80%;
            max-width: 1000px;
        }
        main a{
            text-decoration: none;
            display: inline-block;
            padding: 2rem;
            background-color: black;
            color: white;
            margin: 1rem;
            border-radius: 1rem;
        }
        footer{
            text-align: center;
            background-color: black;
            color: white;
        }
        footer h3{
            padding: 2rem;
        }
        .commentsystem{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: lightgray;
            padding-bottom: 1rem;
        }
        .commentsystem form{
            width: 80%;
        }
        .commentsystem form .f textarea{
            width: 100%;
            display: block;
            margin-bottom: 1rem;
        }
        .commentsystem form .f input{
            background-color: black;
            color: white;
            padding: 1rem;
            border: none;
            font-size: large;
            border-radius: 0.4rem;
        }

    </style>
</head>
<body>
    <nav>
        <ul>
            <li>Home</li>
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
    <main>
        <div class="center">
            <h1>My Name is Muhammad Yasir Hussain</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sint corporis, eligendi illo, consequuntur eaque vitae molestias, cumque aliquam reiciendis voluptatum. Dignissimos culpa amet aliquid sit harum, provident consequuntur saepe.</p>
            <a href="room.php/?rname=Create_room">Create_room</a><a href="room.php/?rname=Join_room">Join_room</a><a href="room.php/?rname=Delete_room">Delete_room</a>
        </div>
    </main>
    <div class="commentsystem">
        <form action="index.php" method="post">
            <div class="f">
                <h3>Write feedback here</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, pariatur beatae esse dolorem obcaecati possimus velit omnis atque quisquam sit rerum doloremque amet ipsa aspernatur enim, ad corporis commodi natus.</p>
            </div>
            <div class="f">
                <form action="index.php" method="post">
                <textarea name="msg" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Commit" name="submit">
                </form>
                
            </div>
        </form>
    </div>
    <div class="comments">
        <h3>comments:</h3>
        <?php
            $q2="select comment,email,date from cs";
            $rq2=mysqli_query($db,$q2);
            
            while($data=mysqli_fetch_assoc($rq2)) { 
                ?>
                <div class="c">
                <div class="circle"></div>
                <div class="content">
                <h3><?php echo $data['email']; ?></h3>
                <p><?php echo $data['comment']; ?></p>
                <p><?php echo $data['date']; ?></p>
                </div>
                </div>
                <?php
            }
        ?>
    </div>
    <footer>
        <h3>Created by Muhammad Yasir Hussain</h3>
    </footer>
</body>
</html>