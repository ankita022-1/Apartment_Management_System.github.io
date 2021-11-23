<?php
session_start();
include '../connection.php'; 

$email=$_SESSION['adm_email'];
$emailQuery="delete from admin where Email='$email' ";
$query=mysqli_query($dbcon, $emailQuery);

if($query){
  session_destroy();
  setcookie('adm_emailCookie', '', time()-86400);
  setcookie('adm_passwordCookie', '', time()-86400);
  echo "<script> alert('Your account has been deactivated.'); location.replace('create_account.php');</script>";
}
else{    
  echo "<script> alert('ERROR: Your account has not been deactivated.'); location.replace('admin_home.php'); </script>";
}
?>

