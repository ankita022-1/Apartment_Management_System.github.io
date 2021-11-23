<?php
session_start();
include '../../connection.php';

$flat_id=$_GET['flat_id'];
$delQuery="delete from flat where Flat_id=$flat_id";
$del_res=mysqli_query($dbcon, $delQuery);

if($del_res){
  echo "<script> alert('Record has been deleted successfully.'); location.replace('show_flat.php');</script>";
}
else{    
  echo "<script> alert('ERROR: Record has not been deleted ...'); location.replace('show_flat.php'); </script>";
}
?>

