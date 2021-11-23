<?php
session_start();
if(!isset($_SESSION['adm_username'])){
    header('Location:../login.php');
}
include '../../connection.php';
include '../../css/admin_style.css';
include '../../links/admin_links.php';
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
     <?php include 'header.php'; ?>

    <section class="vh-200 gradient-custom">
        <div class="containerp py-5 h-200">
                                <h2 class="fw-bold mb-2 text-uppercase" style="color:black; font-weight:bold;">Tenant Details</h2>

            <div class="card bg-light text-dark col  border-outline-success tab"
                style="border-radius: 1rem;">
                <table class="table">
                    <thead class="thead-dark"> 
                        <tr>
                            <th>S_No.</th>
                            <th>Apartment_id</th>                            
                            <th>Flat_id</th>                            
                            <th>Name</th>                            
                            <th>Email</th>
                            <th>Phone_number</th>                            
                            <th>Occupation</th>
                            <th>Permanent_address</th>
                            <th>Buyer_photo</th>
                            <th>Adhar_card</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>                            
                    </thead>
                <tbody>
                    <?php
                    $admin_id=$_SESSION['admin_id'];
                    
                    $selectQuery="select * from buyer_info as b where b.admin_id=$admin_id  ";
                    $query=mysqli_query($dbcon, $selectQuery);
                    $i=1;
                    while($res=mysqli_fetch_array($query)){                                                                    
                        ?>
                        <tr>
                        <td style="color:black; font-weight: bold;"><?php echo $i++; ?></td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Apartment_id']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Flat_id']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Name']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Email']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Phone_number']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Occupation']; ?> </td>
                        <td style="color:black; font-weight: bold;"><?php echo $res['Permanent_address']; ?> </td>                     

                        <td><a href="show_img.php?imgPath=<?php echo $res['Buyer_photo']; ?>"><img src="<?php echo $res['Buyer_photo']; ?> "  class='img'></a></td>

                        <td><a href="<?php echo $res['Adhar_card']; ?>" target="_blank" style=" font-weight: bold;"><img src="https://img.icons8.com/material-sharp/24/000000/pdf.png" /><?php if(($res['Adhar_card'])==NULL){echo "No File";}else{echo "Downlod File";} ?></a></td> 

                        <td><a href="UpdateQuery.php?buyer_id=<?php echo $res['Buyer_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Update" class="box"><i class="fa fa-edit " aria_hidden="true"></i></a></td>

                        <td><a href="deleteQuery.php?buyer_id=<?php echo $res['Buyer_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete" class="box"><i class="fa fa-trash " aria_hidden="true"></i></a> </td>
                         </tr>                         
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
    
    if(isset($_POST['submit2'])){
      ?>
        <script>           
            location.replace('../admin/add_apartment.php');          
        </script>
      <?php

    }
    if(isset($_POST['submit3'])){
      ?>
        <script>
           let conf= confirm('are you sure?'); 
           if(conf){
               location.replace('../admin/logout.php');
            }
        </script>
      <?php
    }
    if(isset($_POST['submit4'])){
      ?>
        <script>
           let conf= confirm('Are you sure, you want to deactivate your account?'); 
           if(conf){
               location.replace('../admin/deactivate.php');
            }
        </script>
      <?php
    }
    if(isset($_POST['submit5'])){
      ?>
        <script>           
            location.replace('../admin/admin_home.php');          
        </script>
      <?php
    }
?>