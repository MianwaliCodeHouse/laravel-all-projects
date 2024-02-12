<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main/style.css">
    <link rel="stylesheet" href="main/index.css">
</head>
<body>
    <div class="container">
    <?php include "main/head.php" ?>
    <main>
        <div class="f1">
            <h1>Hi</h1>
            <h2>I'm Muhammad Yasir Hussain from Pakistan.</h2>
            <h1 class="a">About</h1>
            <p>I'm a full stack developer.This is the project of <span>Login form + Registration form + landing page + Comment system</span> in Php with MySql. <br>
        <span>Note:</span>You will be able to comment/give feedback After login throught comment system</p>
            <a href="main/Muhammad Yasir Hussain.png" download="M_yasir.png">Download CV</a>
        </div>
        <div class="f2">
            <h1>skills</h1>
            <div>
                <p>Html <span>100%</span></p>
            <div class="p1"></div>
            </div>
            <div>
            <p>CSS <span>90%</span></p>
            <div class="p2"></div>
            </div>
            <div>
                <p>JS <span>80%</span></p>
            <div class="p3"></div>
            </div>
            <div>
                <p>Jquery <span>85%</span></p>
            <div class="p4"></div>
            </div>
            <div>
                <p>Php <span>90%</span></p>
            <div class="p5"></div>
            </div>
            <div>
                <p>Python <span>85%</span></p>
            <div class="p6"></div>
            </div>
        </div>
        <div class="f3">
            <?php
            if (isset($_POST['submit'])) {
                if (isset($_SESSION['login'])) {
                    # code...
                    $msg=$_POST['comment'];
                    $email=$_SESSION['login'];
                    $query="INSERT INTO `comments` (`comment`, `email`, `date`) VALUES ('$msg', '$email', current_timestamp());";
                    $rquery=mysqli_query($db,$query);

                }else{
                    echo "<script>alert('login is required for comment.')</script>";
                }
            }
            ?>
            <button><h3>Comments Here</h3>
            <div class="commentsystem css">
            <form action="index.php" method="POST">
                <textarea name="comment" id="" cols="30" rows="5" placeholder="Write comment here"></textarea>
                <input type="submit" value="submit" name="submit">
            </form>
            <br>
            <h3>Comments</h3>
            <div class="showcomment">
                <?php
                $query="select * from comments order by sr desc";
                $rquery=mysqli_query($db,$query);
                while($data=mysqli_fetch_assoc($rquery)){
                    ?>
                    <div class="cards">
                    <h3><?php echo $data['email']; ?></h3>
                    <p><?php echo $data['comment']; ?></p>
                    <p><?php echo $data['date']; ?></p>
                    </div>
                    <?php
                }
                ?>
                
                
            </div>
            </div>
            </button>
            
        </div>
    </main>
    <?php include "main/foot.php" ?>
    </div>
</body>
</html>