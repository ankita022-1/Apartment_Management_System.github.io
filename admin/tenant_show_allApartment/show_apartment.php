<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:../../tenant/login.php');
}
include '../../connection.php';
include '../../css/tenant_style.css';
include '../../links/tenant_links.php';
?>
 <style >
.tab{
    padding-top: 1rem;
    padding-bottom: 1rem;
}
.containerp{
    width:96%;
    padding-left:0px ;
    padding-right:0px ;
    margin-right: 2%;
    margin-left: 2%;
}
.img{
    height: 100px;
    width: 100px;
}

</style>
<body class="vh-100 gradient-custom" id="bod">
     <header class="bg-dark text-white col px-md-2 py-md-2">
        <div class="h2 d-inline-flex ">Apartment Management System</div>
        <form action="" method="POST" class='t_form'>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit1">Tenant Home Page </button>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit2">Apartment Details </button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit3">Logout</button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit4">Deactivate Account</button>
        </form>
     </header>

    <section class="vh-200 gradient-custom">
        <div class="containerp py-5 h-200">
            <div class="card bg-light text-dark col  border-outline-success tab"
                style="border-radius: 1rem;">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>S_No.</th>                            
                            <th>Apartment ID</th>                            
                            <th>Place</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Owner Phone Number</th>
                            <th>Picture of Building</th>
                            <th>Building Info</th>
                            
                        </tr>
                    </thead>
                  <tbody>
                    <?php
                    $selectQuery="select * from apartment_info as i, admin as a where i.Admin_id=a.Admin_id";
                    $query=mysqli_query($dbcon, $selectQuery);
                    $i=1;
                    while($res=mysqli_fetch_array($query)){                                                                    
                        ?>
                        <tr>
                        <td style="color:black; font-weight: bold;"><?php echo $i++; ?></td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Apartment_id']; ?></td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Place']; ?> </td>
                        <td style="color:blue; font-weight: bolder;"><?php echo $res['Name']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Email']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Phone_number']; ?> </td>

                        <td><a href="show_img.php?imgPath=<?php echo $res['Photo']; ?>"><img src="<?php echo $res['Photo']; ?> "  class='img'></a></td>

                        <td><a href="<?php echo $res['File']; ?>" target="_blank" style=" font-weight: bold;"><img src="https://img.icons8.com/material-sharp/24/000000/pdf.png" /><?php if(($res['File'])==NULL){echo "No File";}else{echo "Downlod File";} ?></a></td>                         
                        <?php
                    }
                    ?>  
                </tbody>                 
                </table>
            </div>
        </div>
    </section>
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