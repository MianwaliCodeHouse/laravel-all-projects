<?php
include_once "db.php";
if (isset($_POST['submit'])) {
  $email=$_POST['email'];
  $stdID=$_POST['stdID'];
  $query1="SELECT * FROM `admission` WHERE email='$email' and stdID='$stdID'";
  $rq=mysqli_query($db,$query1);
  $data=mysqli_fetch_assoc($rq);
  if($data){
  if($data['status']==1){
    echo "<script>alert('Your Application is Under the Process... :)')</script>";
  }else if($data['status']==2){
    echo "<script>alert('Congratulation! You Application has been Accepted... :)')</script>";
  }else{
    echo "<script>alert('Sorry! Your Application has been rejected . Try again next time... :)')</script>";
  }
  echo "<a href='index.html' id='back'>.</a>";
echo "<script>back.click()</script>";
}else{
  echo "<script>alert('Sorry! You enter wrong data... :)')</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UOM | Check status</title>
  <link rel="shortcut icon" href="asset/uom-logo.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="css/form.css">
</head>
<body>
<div class="form">
    <nav>
      <h1>Check Status</h1>
    </nav>
    <form action="" method="post">
      <h3>Email</h3>
      <input type="email" name="email" required>
      <h3>Application ID</h3>
      <input type="text" name="stdID" required>
      <input type="submit" value="Submit" name="submit">
    </form>
</div>
</body>
</html>