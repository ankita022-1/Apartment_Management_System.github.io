<style >       
        #t_form{
            position: relative;
            /*border: 2px solid black;*/
            display: flex;
            justify-content: center;
            align-items: center;
            top: 10px;
            right: 10px;
        }
        .t_form_btn{
            margin: 0px 2px;
        }
        
</style>
<header class="bg-dark text-white col px-md-2 py-md-2">
        <div class="h2 d-inline-flex ">Apartment Management System</div>
        <form action="" method="POST" class='t_form' id='t_form'>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit1">HOME </button>
            <button class="btn btn-outline-success my-2 my-sm-0  t_form_btn" type="submit" name="submit2">All Apartment Details </button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit3">Add Apartment</button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit4">Add Flat</button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit5">Add Tenant</button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit6">Your Apartment</button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit7">Your Flat</button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit8">Tenant Info.</span></button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit10">Logout</button>
            <button class="btn btn-outline-success my-2 my-sm-0 t_form_btn" type="submit" name="submit11">Deactivate Account</button>
        </form>
</header>

<?php
    if(isset($_POST['submit1'])){
      ?>
        <script>           
            location.replace('../admin_home.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit2'])){
      ?>
        <script>           
            location.replace('../apartment/show_all_apartment.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit3'])){
      ?>
        <script>           
            location.replace('../apartment/add_apartment.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit4'])){
      ?>
        <script>           
            location.replace('add_flat.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit5'])){
      ?>
        <script>           
            location.replace('../buyer/add_buyer.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit6'])){
      ?>
        <script>           
            location.replace('../apartment/show_apartments.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit7'])){
      ?>
        <script>           
            location.replace('show_flat.php');          
        </script>
      <?php
    }
    if(isset($_POST['submit8'])){
      ?>
        <script>           
            location.replace('../buyer/show_buyer.php');          
        </script>
      <?php
    }
    
    if(isset($_POST['submit10'])){
      ?>
        <script>
           let conf= confirm('are you sure?'); 
           if(conf){
               location.replace('../logout.php');
            }
        </script>
      <?php
    }
    if(isset($_POST['submit11'])){
      ?>
        <script>
           let conf= confirm('Are you sure, you want to deactivate your account?'); 
           if(conf){
               location.replace('../deactivate.php');
            }
        </script>
      <?php
    }
    
?>