<?php
session_start();
include '../../connection.php';

$flat_id=$_GET['flat_id'];
$showQuery="select * from flat where Flat_id=$flat_id";
$upd_query=mysqli_query($dbcon, $showQuery);
$res=mysqli_fetch_array($upd_query);

if($res['Admin_id'] != $_SESSION['admin_id']){
    echo "<script> alert('Only Owner of this flat can edit.'); location.replace('show_flat.php'); </script>";        
}
setcookie('flat_id', $flat_id, time()+60);
?>
<script>           
    location.replace('update_info.php');          
</script>
