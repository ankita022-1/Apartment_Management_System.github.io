<?php
session_start();
include '../../connection.php';

$buyer_id=$_GET['buyer_id'];
$delQuery="delete from buyer_info where Buyer_id=$buyer_id";
$del_res=mysqli_query($dbcon, $delQuery);

if($del_res){
  echo "<script> alert('Record has been deleted successfully.'); location.replace('show_buyer.php');</script>";
}
else{    
  echo "<script> alert('ERROR: Record has not been deleted ...'); location.replace('show_buyer.php'); </script>";
}
?>

