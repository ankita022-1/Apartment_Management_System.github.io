<?php
session_start();
include '../../connection.php';

$apt_id=$_GET['apt_id'];
$showQuery="select * from apartment_info where Apartment_id=$apt_id";
$upd_query=mysqli_query($dbcon, $showQuery);
$res=mysqli_fetch_array($upd_query);

if($res['Admin_id'] != $_SESSION['admin_id']){
    echo "<script> alert('Only Owner of this apartment can edit.'); location.replace('show_apartments.php'); </script>";        
}
setcookie('apt_id', $apt_id, time()+60);
?>
<script>           
    location.replace('update_info.php');          
</script>
