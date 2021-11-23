<?php
session_start();
include '../../connection.php';

$buyer_id=$_GET['buyer_id'];
$showQuery="select * from buyer_info where Buyer_id=$buyer_id";
$upd_query=mysqli_query($dbcon, $showQuery);
$res=mysqli_fetch_array($upd_query);

if($res['Admin_id'] != $_SESSION['admin_id']){
    echo "<script> alert('Only Owner of this flat can delete it.'); location.replace('show_buyer.php'); </script>";       
}
?>
<script>
   let conf= confirm('are you sure, you want to delete data?'); 
   if(conf){
       location.replace('delete_info.php?buyer_id=<?php echo $buyer_id; ?>');
    }
    else{
       location.replace('show_buyer.php');

    }
</script>