<?php
session_start();
include '../../connection.php';

$apt_id=$_GET['apt_id'];
$delQuery="delete from apartment_info where Apartment_id=$apt_id";
$del_res=mysqli_query($dbcon, $delQuery);

if($del_res){
  echo "<script> alert('Record has been deleted successfully.'); location.replace('show_apartments.php');</script>";
}
else{    
  echo "<script> alert('ERROR: Record has not been deleted ...'); location.replace('show_apartments.php'); </script>";
}
?>

