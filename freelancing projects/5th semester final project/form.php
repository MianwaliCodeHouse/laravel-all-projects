<?php
include_once "db.php";
if (isset($_POST['submit'])) {
  $sname=$_POST['name'];
  $fname=$_POST['fname'];
  $sex=$_POST['Gender'];
  $clgname=$_POST['collegename'];
  $obtmarks=$_POST['obtmarks'];
  $tmarks=$_POST['tmarks'];
  $board=$_POST['board'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $BSprogram=$_POST['BSprogram'];
  $verify="select * from `admission` where email='$email'";
  $rq2=mysqli_query($db,$verify);
  $data=mysqli_fetch_assoc($rq2);
  if($data){
    echo "<script>alert('You can not apply through this email because this email already exists in the database...')</script>";
    echo "<a href='form.html'>Try through an other email</a>";
  }else{
        //Get application ID
function stdID(){
  $string = (uniqid(rand(), true));
  return substr($string, 0,5);
  }
    
  $stdID = "UOM/ADM/".date("Y")."/".stdID();
  $query1="INSERT INTO `admission`(`stdname`, `fname`, `sex`, `college`, `obtmarks`, `tmarks`, `board`, `phone`, `email`, `address`, `status`,`stdID`,`BSprogram`) VALUES ('$sname','$fname','$sex','$clgname',$obtmarks,$tmarks,'$board','$phone','$email','$address',1,'$stdID','$BSprogram')";
  $rq1=mysqli_query($db,$query1);
  
  if($rq1){


    echo "<script>alert('Your application has successfully submited! ')</script>";

      echo "<script>alert('Plz Note down your ApplicationID $stdID ')</script>";
  }else{
    echo "<script>alert('Something is wrong')</script>";
  }
}
echo "<a href='index.html' id='back'>.</a>";
echo "<script>back.click()</script>";
}else{
  header('location: form.html');
}

?>