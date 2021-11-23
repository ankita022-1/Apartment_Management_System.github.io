<?php
session_start();
include '../../connection.php';
include '../../css/admin_style.css';
include '../../links/admin_links.php';
$imgPath=$_GET['imgPath'];
?>
<style >	
	body{
		background-color: gray;
	}
	.img{
		width: 100vw;
		height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>
<body>
    <?php include 'header.php'; ?>
    <div class="img">
       <img src="<?php echo $imgPath; ?>" style="height: 1000px; width: 1000px;">
    </div>
</body>
</html>

