<?php
session_start();
include '../../connection.php';
include '../../css/tenant_style.css';
include '../../links/tenant_links.php';
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
    <header class="bg-dark text-white col px-md-2 py-md-2">
        <div class="h2 d-inline-flex ">Apartment Management System</div>
        <form action="" method="POST" class='t_form'>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit1">Tenant Home Page </button>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit2">Apartment Details </button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit3">Logout</button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit4">Deactivate Account</button>
        </form>
     </header>
    <div class="img">
       <img src="<?php echo $imgPath; ?>" style="height: 1000px; width: 1000px;">
    </div>
</body>
</html>
<?php    
    if(isset($_POST['submit1'])){
      ?>
        <script>
               location.replace('../../tenant/tenant_home.php');
        </script>
      <?php
    }
    if(isset($_POST['submit2'])){
      header('Location:show_apartment.php');
    }
    if(isset($_POST['submit3'])){
      ?>
        <script>
           let conf= confirm('are you sure?'); 
           if(conf){
               location.replace('../../tenant/logout.php');
            }
        </script>
      <?php
    }
    if(isset($_POST['submit4'])){
      ?>
        <script>
           let conf= confirm('Are you sure, you want to deactivate your account?'); 
           if(conf){
               location.replace('../../tenant/deactivate.php');
            }
        </script>
      <?php
    }
?>
