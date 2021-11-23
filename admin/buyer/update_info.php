<?php
session_start();
if(!isset($_SESSION['adm_username'])){
    header('Location:../login.php');
}
include '../../connection.php';
include '../../css/admin_style.css';
include '../../links/admin_links.php';
?>

<body class="vh-100 gradient-custom align-items-left" id="bod">
    <?php include 'header.php'; ?>
    <section class="vh-200 gradient-custom">
        <div class="containerp py-5 h-200">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div>
                                <h2 class="fw-bold mb-2 text-uppercase">Update Tenant</h2>
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="post" method="POST" enctype="multipart/form-data">
                                <?php 
                                    $buyer_id=$_COOKIE['buyer_id'];
                  
                                    $query="select * from buyer_info where Buyer_id=$buyer_id";
                                    $upd_query=mysqli_query($dbcon, $query);
                                    $upd_info_Count=mysqli_num_rows($upd_query);
                  
                                    if($upd_info_Count<1){
                                      echo "<script> alert('Data Not Found in database...');                 location.replace('show_buyer.php'); </script>";            
                                    }            
                                    else{               
                                       $db_upd_data=mysqli_fetch_array($upd_query);            
                                                  
                                       $imgPath=$db_upd_data['Buyer_photo'];            
                                       $pdfPath=$db_upd_data['Adhar_card'];             
                                    }
                                ?>               
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-sharp/24/000000/name.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="fname" id="full" placeholder="Full Name" class="form-control form-control-md" value="<?php echo $db_upd_data['Name']; ?>" required />
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
                                                class="form-control form-control-md" value="<?php echo $db_upd_data['Phone_number']; ?>" required/>
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
                                                placeholder="Email" value="<?php echo $db_upd_data['Email']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-outlined/24/000000/business.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="occupation" class="form-control" id="occupation"
                                                placeholder="Occupation" value="<?php echo $db_upd_data['Occupation']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-outlined/24/000000/address.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="Permanent Address"value="<?php echo $db_upd_data['Permanent_address']; ?>" required>
                                        </div>
                                    </div>  
                                <div class="form-row">   
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-sharp/24/000000/calculator.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="apartment_id" id="apartment_id" placeholder="Enter Apartment ID"
                                                class="form-control form-control-md" value="<?php echo $db_upd_data['Apartment_id']; ?>" required />
                                        </div>
                                    </div>   
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="https://img.icons8.com/material-sharp/24/000000/calculator.png" />
                                                </div>
                                            </div>
                                            <input type="text" name="flat_id" id="flat_id" placeholder="Enter Flat ID"
                                                class="form-control form-control-md" value="<?php echo $db_upd_data['Flat_id']; ?>" required />
                                        </div>
                                    </div>   
                                </div>                              
                                    <div class="form-row">  
                                        <div class="form-group col-md-6">
                                                <label for="room">upload Picture of Flat</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><img
                                                                src="https://img.icons8.com/material-outlined/24/000000/camera.png" />
                                                        </div>
                                                    </div>
                                                    <input type="file" name="img" class="form-control" id="img"
                                                        placeholder="Image" required />
                                                </div>
                                        </div>                                               
                                        <div class="form-group col-md-6">
                                        <label for="price">upload flat pdf file</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <img src="https://img.icons8.com/material-rounded/24/000000/file.png" />
                                                </div>
                                            </div>
                                            <input type="file" name="pdf" id="pdf" placeholder="pdf"
                                                class="form-control form-control-md" />
                                        </div>
                                    </div>                        
                                 </div>                                     

                                    <input class="btn btn-outline-light btn-lg px-5" style='color: green; font-weight: bold;' type="submit" name="submit" value="Update ">
                                </form>
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
// Buyer_id Admin_id    Apartment_id    Flat_id Name    Email   Phone_number    Occupation  Permanent_address   Buyer_photo Adhar_card
if(isset($_POST['submit'])){
  $buyer_id=$_COOKIE['buyer_id'];
  $admin_id=$_SESSION['admin_id'];

  $fname=$_POST['fname'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $occupation=$_POST['occupation'];
  $address=$_POST['address'];
  $apartment_id=$_POST['apartment_id'];
  $flat_id=$_POST['flat_id'];
  $img=$_FILES['img'];
  $pdf=$_FILES['pdf'];

  // print_r($img);
  // print_r($pdf);

  $imgFileName=$img['name'];
  $imgFilePath=$img['tmp_name'];
  $imgFileError=$img['error'];
  $pdfFileName=$pdf['name'];
  $pdfFilePath=$pdf['tmp_name'];
  $pdfFileError=$pdf['error'];

  $_SESSION['fname']=$fname;
  $_SESSION['phone']=$phone;
  $_SESSION['email']=$email;
  $_SESSION['occupation']=$occupation;
  $_SESSION['address']=$address;
  $_SESSION['apartment_id']=$apartment_id;
  $_SESSION['flat_id']=$flat_id;

   // buyer will be only inserted if apartment and flat exists and belongs to user.
    $query="select Admin_id from apartment_info where Apartment_id=$apartment_id";
    $upd_query=mysqli_query($dbcon, $query);
    $upd_info_Count=mysqli_num_rows($upd_query);
    $res=mysqli_fetch_array($upd_query);
              
    if($upd_info_Count<1){
      echo "<script> alert('No such apartment of this id exist.'); location.replace('add_buyer.php');</script>";            
    }            
    else if($res['Admin_id'] != $admin_id){               
      echo "<script> alert('Sorry.. you can not add apartment of other owner.'); location.replace('add_buyer.php');</script>";
    }
    else{
       $query="select Admin_id from flat where Flat_id=$flat_id";
       $upd_query=mysqli_query($dbcon, $query);
       $upd_info_Count=mysqli_num_rows($upd_query);
       $res=mysqli_fetch_array($upd_query);
                 
       if($upd_info_Count<1){
         echo "<script> alert('No such flat of this id exist.'); location.replace('add_buyer.php');</script>";            
       }            
       else if($res['Admin_id'] != $admin_id){               
            echo "<script> alert('Sorry.. you can not add flat of other owner.'); location.replace('add_buyer.php');</script>";   
        }
        else{
            if(($imgFileError!=0)&&($pdfFileError!=0)){
                $updateQuery="update buyer_info set Buyer_id=$buyer_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Flat_id=$flat_id, Name='$fname', Email='$email', Phone_number='$phone', Occupation='$occupation',Permanent_address='$address', Buyer_photo='$imgPath', Adhar_card='$pdfPath' where Buyer_id=$buyer_id";

                // inserting data into database
                $iQuery=mysqli_query($dbcon, $updateQuery);
                if($iQuery){
                    unset($_SESSION['fname']);
                      unset($_SESSION['phone']);
                      unset($_SESSION['email']);
                      unset($_SESSION['occupation']);
                      unset($_SESSION['address']);
                      unset($_SESSION['apartment_id']);
                      unset($_SESSION['flat_id']);
                  echo "<script> alert('Data updated successfully...'); location.replace('show_buyer.php'); </script>";           
                }
                else{
                  echo "<script> alert('ERROR... Data is not updated.'); </script>";
                }  
            } 
            else if(($imgFileError!=0)&&($pdfFileError==0)){
                // updating pdf file with validation in upload_pdf folder
                $pdfName_explode=explode('.', $pdfFileName);
                $pdf_extension=strtolower(end($pdfName_explode));
                $valid_pdfExtension=array('pdf');
                if(in_array($pdf_extension, $valid_pdfExtension)){
                    $pdfNewPath='../flat/upload_file_pdf/'.$pdfFileName;
                    move_uploaded_file($pdfFilePath, $pdfNewPath);
                    $updateQuery="update buyer_info set Buyer_id=$buyer_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Flat_id=$flat_id, Name='$fname', Email='$email', Phone_number='$phone', Occupation='$occupation',Permanent_address='$address', Buyer_photo='$imgPath', Adhar_card='$pdfNewPath' where Buyer_id=$buyer_id";
                }
                else{
                    echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
                } 
                // inserting data into database
               $iQuery=mysqli_query($dbcon, $updateQuery);
               if($iQuery){
                   unset($_SESSION['fname']);
                     unset($_SESSION['phone']);
                     unset($_SESSION['email']);
                     unset($_SESSION['occupation']);
                     unset($_SESSION['address']);
                     unset($_SESSION['apartment_id']);
                     unset($_SESSION['flat_id']);
                 echo "<script> alert('Data updated successfully...'); location.replace('show_buyer.php');</script>";           
               }
               else{
                 echo "<script> alert('ERROR... Data is not updated.'); </script>";
               }  
            }
            else{
               // uploading images with validation in upload_img folder
                $imgName_explode=explode('.', $imgFileName);
                $img_extension=strtolower(end($imgName_explode));
                $valid_imgExtension=array('png', 'jpg', 'jpeg');
                if(in_array($img_extension, $valid_imgExtension)){
                   $imgNewPath='../flat/upload_flat_image/'.$imgFileName;
                   move_uploaded_file($imgFilePath, $imgNewPath);       
                   if($pdfFileError!=0){
                   $updateQuery="update buyer_info set Buyer_id=$buyer_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Flat_id=$flat_id, Name='$fname', Email='$email', Phone_number='$phone', Occupation='$occupation',Permanent_address='$address', Buyer_photo='$imgNewPath', Adhar_card='$pdfPath' where Buyer_id=$buyer_id";
                }
                else{
                // uploading pdf file with validation in upload_pdf folder

                   $pdfName_explode=explode('.', $pdfFileName);
                   $pdf_extension=strtolower(end($pdfName_explode));
                   $valid_pdfExtension=array('pdf');
                   if(in_array($pdf_extension, $valid_pdfExtension)){
                       $pdfNewPath='../flat/upload_flat_pdf/'.$pdfFileName;
                       move_uploaded_file($pdfFilePath, $pdfNewPath);
                       $updateQuery="update buyer_info set Buyer_id=$buyer_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Flat_id=$flat_id, Name='$fname', Email='$email', Phone_number='$phone', Occupation='$occupation',Permanent_address='$address', Buyer_photo='$imgNewPath', Adhar_card='$pdfNewPath' where Buyer_id=$buyer_id";
                    }
                    else{
                       echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
                    }          
                }        
                // inserting data into database
                $iQuery=mysqli_query($dbcon, $updateQuery);
                if($iQuery){
                    unset($_SESSION['fname']);
                     unset($_SESSION['phone']);
                     unset($_SESSION['email']);
                     unset($_SESSION['occupation']);
                     unset($_SESSION['address']);
                     unset($_SESSION['apartment_id']);
                     unset($_SESSION['flat_id']);
       
                    echo "<script> alert('Data updated successfully...'); location.replace('show_buyer.php');</script>";
                }
                else{
                  echo "<script> alert('ERROR... Data is not updated.'); </script>";
                }  
            } 
            else{
                echo "<script> alert('ERROR... Image extension should be png, jpg or jpeg.'); </script>";        
            }   
        }  
    }
}
}
?>
