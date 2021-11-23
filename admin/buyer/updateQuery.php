<?php
session_start();
include '../../connection.php';

$buyer_id=$_GET['buyer_id'];
$showQuery="select * from buyer_info where Buyer_id=$buyer_id";
$upd_query=mysqli_query($dbcon, $showQuery);
$res=mysqli_fetch_array($upd_query);

if($res['Admin_id'] != $_SESSION['admin_id']){
    echo "<script> alert('Only Owner of this flat can edit.'); location.replace('show_buyer.php'); </script>";        
}
setcookie('buyer_id', $buyer_id, time()+60);
?>
<script>           
    location.replace('update_info.php');          
</script>
