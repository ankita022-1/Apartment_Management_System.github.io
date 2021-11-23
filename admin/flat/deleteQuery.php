<?php
session_start();
include '../../connection.php';

$flat_id=$_GET['flat_id'];
$showQuery="select * from flat where Flat_id=$flat_id";
$upd_query=mysqli_query($dbcon, $showQuery);
$res=mysqli_fetch_array($upd_query);

if($res['Admin_id'] != $_SESSION['admin_id']){
    echo "<script> alert('Only Owner of this flat can delete it.'); location.replace('show_flat.php'); </script>";       
}
?>
<script>
   let conf= confirm('are you sure, you want to delete data?'); 
   if(conf){
       location.replace('delete_info.php?flat_id=<?php echo $flat_id; ?>');
    }
    else{
       location.replace('show_flat.php');

    }
</script>