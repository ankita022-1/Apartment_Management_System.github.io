<?php
session_start();
include '../../connection.php';

$apt_id=$_GET['apt_id'];
$showQuery="select * from apartment_info where Apartment_id=$apt_id";
$upd_query=mysqli_query($dbcon, $showQuery);
$res=mysqli_fetch_array($upd_query);

if($res['Admin_id'] != $_SESSION['admin_id']){
    echo "<script> alert('Only Owner of this apartment can delete it.'); location.replace('show_apartments.php'); </script>";       
}
?>
<script>
   let conf= confirm('are you sure, you want to delete data?'); 
   if(conf){
       location.replace('delete_info.php?apt_id=<?php echo $apt_id; ?>');
    }
    else{
       location.replace('show_apartments.php');

    }
</script>