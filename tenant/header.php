<header class="bg-dark text-white col px-md-2 py-md-2">
        <div class="h2 d-inline-flex ">Apartment Management System</div>
        <form action="" method="POST" class='t_form'>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit1">Tenant Home Page </button>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit2">Apartment Details </button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit3">Logout</button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit4">Deactivate Account</button>
        </form>
</header>
<?php
    if(isset($_POST['submit1'])){
      header('Location:tenant_home.php');
    }
    if(isset($_POST['submit2'])){
      header('Location:../admin/tenant_show_allApartment/show_apartment.php');
    }
    if(isset($_POST['submit3'])){
      ?>
        <script>
           let conf= confirm('are you sure?'); 
           if(conf){
               location.replace('logout.php');
            }
        </script>
      <?php
    }
    if(isset($_POST['submit4'])){
      ?>
        <script>
           let conf= confirm('Are you sure, you want to deactivate your account?'); 
           if(conf){
               location.replace('deactivate.php');
            }
        </script>
      <?php
    }
?>