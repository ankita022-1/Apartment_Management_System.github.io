<?php
session_start();
ob_start();

include '../connection.php';
include '../css/admin_style.css';
include '../links/admin_links.php';
?>

<body id="bod">
    <header class="bg-dark text-white col px-md-2 py-md-2">
        <div class="h2 d-inline-flex ">Apartment Management System</div>
        <form action="" method="POST" class='t_form'>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit1">HOME PAGE</button>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit2">Tenant login </button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit3">Admin login</button>
        </form>
        <?php
             if(isset($_POST['submit1'])){
               header('Location:../index.php');
             }
             if(isset($_POST['submit2'])){
               header('Location:../tenant/login.php');
             }
             if(isset($_POST['submit3'])){
               header('Location:login.php');
             }
    
         ?>
    </header>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div >
                                <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                                <p class="text-white-50 mb-5">Please enter your info for <span style="color:yellowgreen; font-weight:bold;">Admin</span>!</p>
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="post" method="POST">                               
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-outlined/24/000000/email.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="email" class="form-control" id="typeEmailX"
                                                placeholder="Enter Your Email" value="<?php if(isset($_COOKIE['adm_emailCookie'])){echo $_COOKIE['adm_emailCookie'];} ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <img
                                                        src="https://img.icons8.com/material-rounded/24/000000/password.png" />
                                                </div>
                                            </div>
                                            <input type="password" name="password" id="typePasswordX"
                                                placeholder="password" class="form-control form-control-md" value="<?php if(isset($_COOKIE['adm_passwordCookie'])){echo $_COOKIE['adm_passwordCookie'];} ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                Remember Me
                                            </label>
                                        </div>
                                   </div>
                                    <input name='submit' class="btn btn-outline-light btn-lg px-5" type="submit" style='color: green; font-weight: bold;' value="Log In" >
                                </form>

                            </div>

                            <div>
                                <p class="mb-0">New to AMS? <a href="create_account.php" class="text-white-50 fw-bold" style='color: green;'>Create an Account</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $emailQuery="select * from admin where Email='$email' ";
  $query=mysqli_query($dbcon, $emailQuery);
  $emailCount=mysqli_num_rows($query);

  if($emailCount<1){
    echo "<script> alert('Email does not exist.') </script>";
  }
  else{    
        $db_data=mysqli_fetch_array($query);
        $db_passw=$db_data['Password'];
        $passw_verify=password_verify($password, $db_passw);

        if($passw_verify){
           if(isset($_POST['remember'])){
            setcookie('adm_emailCookie', $email, time()+86400);
            setcookie('adm_passwordCookie', $password, time()+86400);
           }
           $_SESSION['admin_id']=$db_data['Admin_id'];
           $_SESSION['adm_username']=$db_data['Name'];
           $_SESSION['adm_email']=$email;
           $_SESSION['adm_password']=$password;
           echo "<script> alert('Login successfully'); location.replace('admin_home.php'); </script>"; 
        }
        else{
            echo "<script> alert('Invalid email or password.') </script>";
        }
  }
}
?>


