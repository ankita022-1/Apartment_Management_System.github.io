<?php
session_start();

include '../connection.php';
include '../css/tenant_style.css';
include '../links/tenant_links.php';
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
               header('Location:login.php');
             }
             if(isset($_POST['submit3'])){
               header('Location:../admin/login.php');
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
                                <h2 class="fw-bold mb-2 text-uppercase">Create Account</h2>
                                <p class="text-white-50 mb-5">Please enter your info for <span style="color:yellowgreen; font-weight:bold;">Tenant</span>!</p>
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="post" method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-sharp/24/000000/name.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="fname" id="full" placeholder="Full Name"
                                                class="form-control form-control-md" required />
                                        </div>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/windows/24/000000/number-pad.png" />
                                                </div>
                                            </div>
                                            <input type="tel" name="phone" id="number" placeholder="Phone Number"
                                                class="form-control form-control-md" required/>
                                        </div>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-outlined/24/000000/email.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="email" class="form-control" id="typeEmailX"
                                                placeholder="Email" required>
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
                                                placeholder="password" class="form-control form-control-md" required/>
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
                                            <input type="password" name="cpassword" id="typePasswordX"
                                                placeholder=" confirm password" class="form-control form-control-md" required/>
                                        </div>
                                    </div>

                                    <div >
                                        <p id='para'>By clicking on Create Account , you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.</p>
                                    </div>

                                    <input class="btn btn-outline-light btn-lg px-5" style='color: green; font-weight: bold;' type="submit" name="submit" value="Create Account">

                                </form>
                            </div>

                            <div>
                                <p class="mb-0">already have an account? <a href="login.php" class="text-white-50 fw-bold" style='color: green;'>Click here</a></p>
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
  $username=$_POST['fname'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $emailQuery="select * from tenant where Email='$email' ";
  $query=mysqli_query($dbcon, $emailQuery);
  $emailCount=mysqli_num_rows($query);

  if($emailCount>0){
    echo "<script> alert('Email already exists.') </script>";
  }
  else{
    if($password===$cpassword){
        $passw=password_hash($password, PASSWORD_BCRYPT);
        $insertQuery="insert into tenant(Name, Email ,Phone_number, Password) values('$username', '$email', '$phone', '$passw') ";
        $iQuery=mysqli_query($dbcon, $insertQuery);
        if($iQuery){
           echo "<script> alert('Data inserted successfully'); location.replace('login.php'); </script>"; 
           // header('location:login.php');
        }
        else{
            echo "<script> alert('Data is not inserted.') </script>";
        }
    }
    else{
        echo "<script> alert('Passwords are not matching.') </script>";
    }
  }
}
?>

