<?php
session_start();
if(!(isset($_SESSION['login']))){
  header("location: login.php");
}else{
echo '<a href="logout.php" class="btn" style="text-decoration:none;padding:1rem 3rem; font-size:2rem;margin:2rem;display:inline-block;border-radius:10px;">Logout</a>';
}
include_once "../db.php";
$q1="SELECT * FROM `admission`";
$rq1=mysqli_query($db,$q1);


if(isset($_POST['submit'])){
  $stdID=$_POST['stdID'];
  $status=$_POST["status"];
  $q2="UPDATE `admission` SET `status`=$status where stdID='$stdID';";
  $rq2=mysqli_query($db,$q2);
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UOM | Admin</title>
  <link rel="shortcut icon" href="../asset/uom-logo.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
  <div class="container">
    <h1>Dashboard</h1>
    <table border='1'>
      <tr>
        <th>Std Name</th>
        <th>Fname</th>
        <th>sex</th>
        <th>clg</th>
        <th>Obtmarks</th>
        <th>Tmarks</th>
        <th>Board</th>
        <th>BSprogram</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Status</th>
        <th>ApplicationID</th>
      </tr>
    <?php
      while($data=mysqli_fetch_assoc($rq1)){
        ?>
        <tr>
        <td><?php echo $data['stdname'];?></td>
        <td><?php echo $data['fname'];?></td>
        <td><?php echo $data['sex']; ?></td>
        <td><?php echo $data['college']; ?></td>
        <td><?php echo $data['obtmarks']; ?></td>
        <td><?php echo $data['tmarks']; ?></td>
        <td><?php echo $data['board']; ?></td>
        <td><?php echo $data['BSprogram']; ?></td>
        <td><?php echo $data['phone']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php if($data['status']==2){
          echo "admit";
        } ?></td>
        <td><?php echo $data['stdID']; ?></td>
        </tr>
        <?php
      }
    ?>
    </table>
    <form action="" method="post" id="formxxx" style="display:none">
    <fieldset>
      <h3>Enter AplicationID</h3>
      <input type="text" name="stdID">
      <h3>Status</h3>
      <input type="number" name="status">
      <p>1)Enter 2 if application accepted.
        <br>
        2)Enter 0 or other number for application rejection
        <br>
        3) Enter 1 for application(default)
      </p>
      <input type="submit" name='submit' value="Submit" class="btn">
    </form>
    </fieldset>
    <button onclick="formxxx.style.display='block'" class="btn">Admit</button>
  </div>
</body>
</html>