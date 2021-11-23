<?php
session_start();
include '../connection.php'; 

$email=$_SESSION['email'];
$emailQuery="delete from tenant where Email='$email' ";
$query=mysqli_query($dbcon, $emailQuery);

if($query){
  session_destroy();
  setcookie('emailCookie', '', time()-86400);
  setcookie('passwordCookie', '', time()-86400);
  echo "<script> alert('Your account has been deactivated.'); location.replace('create_account.php');</script>";
}
else{    
  echo "<script> alert('ERROR: Your account has not been deactivated.'); location.replace('tenant_home.php'); </script>";
}
?>

