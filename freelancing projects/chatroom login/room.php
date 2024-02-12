<?php
session_start();

if (isset($_SESSION['login'])) {
    echo "Wecolme to room";
}
else{
    $msg=$_GET['rname'];
    echo "<script>alert('login is required for $msg')</script>";
}
?>