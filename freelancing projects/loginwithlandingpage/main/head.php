<header>
    <nav>
        <div class="n">
    <h1>Muhammad Yasir Hussain</h1>
        </div>
        <div class="n marquee">
<marquee behavior="" direction="">My name is Muhammad Yasir Hussain from Pakistan. I'm a full stack developer.This is the project of Login form + Registration form + landing page + Comment system  in Php with MySql.</marquee>
        </div>
        <div class="n n3">
        <?php
    if (isset($_SESSION['login'])) {
        # code...
        ?>
        <a href="logout.php">Logout</a>
        <?php
    }else{
        ?>
        <a href="login.php">Login</a><a href="signup.php">SignUP</a>
        <?php
    }
        ?>
        </div>
    </nav>
    <hr>
    <div class="nav2">
        <a href="index.php">Home</a><a href="index.php">About</a><a href="index.php">Contact</a>
    </div>
</header>