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
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100 ">
            <div class="card bg-dark text-white col px-md-5 py-md-5" style="border-radius: 1rem;"> 
                <h2 class="fw-bold mb-2 text-uppercase" style="color:green; font-weight:bold; ">Update Flat Info</h2>
                
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <?php 
                       $flat_id=$_COOKIE['flat_id'];
                  
                       $showQuery="select * from flat where Flat_id=$flat_id";
                       $upd_query=mysqli_query($dbcon, $showQuery);
                       $upd_info_Count=mysqli_num_rows($upd_query);
                  
                        if($upd_info_Count<1){
                          echo "<script> alert('Data Not Found in apartment_info database...');     location.replace('show_flat.php'); </script>";
                        }
                        else{    
                          $db_upd_data=mysqli_fetch_array($upd_query);
                          
                          $imgPath=$db_upd_data['Photo'];
                          $pdfPath=$db_upd_data['File'];
                        }
                    ?>  
                    <label for=" address">Apartment ID</label>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src="https://img.icons8.com/material-sharp/24/000000/calculator.png" />
                                    </div>
                                </div>
                                <input type="text" name="apartment_id" id="address" placeholder="Enter Apartment ID"
                                    class="form-control form-control-md" value="<?php echo $db_upd_data['Apartment_id']; ?>" required />
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="type">TYPE</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img src="https://img.icons8.com/windows/24/000000/room.png" />
                                    </div>
                                </div>
                                <input type="text" name="type" id="type" placeholder="eg: 2BHK"
                                    class="form-control form-control-md" value="<?php echo $db_upd_data['Type']; ?>"  required/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="flat">Flat No.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src="https://img.icons8.com/material-outlined/24/000000/calculator.png" required/>
                                    </div>
                                </div>
                                <input type="text" name="flat" class="form-control" id="flat"
                                    placeholder="Enter Flat Number" value="<?php echo $db_upd_data['Flat_number']; ?>"  required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="floor">Floor No.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src="https://img.icons8.com/material-outlined/24/000000/calculator.png" required/>
                                    </div>
                                </div>
                                <input type="text" name="floor" class="form-control" id="floor"
                                    placeholder="Enter Floor Number" value="<?php echo $db_upd_data['Floor_number']; ?>"  required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="https://img.icons8.com/material-rounded/24/000000/price.png" required/>
                                    </div>
                                </div>
                                <input type="text" name="price" id="price" placeholder="Enter Price"
                                    class="form-control form-control-md" value="<?php echo $db_upd_data['Price']; ?>"  required />
                            </div>
                        </div>  
                        <div class="form-group">
                        <label for="available">Available</label>
                        <select name="available" class="form-control">                        
                            <option selected>Available</option>
                            <option >Not Available</option>
                        </select>
                    </div>                      
                    </div>                    
                    

                    <div class="form-row">  
                        <div class="form-group col-md-6">
                                <label for="room">upload Picture of Flat</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><img
                                                src="https://img.icons8.com/material-outlined/24/000000/camera.png" required/>
                                        </div>
                                    </div>
                                    <input type="file" name="img" class="form-control" id="img"
                                        placeholder="Image ">
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
                    
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>
 <!-- Flat_id    Admin_id    Apartment_id    Type    Flat_number Floor_number    Price   Available   Photo   File -->
<?php 

if(isset($_POST['submit'])){
  $flat_id=$_COOKIE['flat_id'];
  $admin_id=$_SESSION['admin_id'];

  $apartment_id=$_POST['apartment_id'];
  $type=$_POST['type'];
  $flat=$_POST['flat'];
  $floor=$_POST['floor'];
  $price=$_POST['price'];
  $available=$_POST['available'];
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

  $_SESSION['apartment_id']=$apartment_id;
  $_SESSION['type']=$type;
  $_SESSION['flat']=$flat;
  $_SESSION['floor']=$floor;
  $_SESSION['price']=$price;

  if(($imgFileError!=0)&&($pdfFileError!=0)){
     $updateQuery="update flat set Flat_id=$flat_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Type='$type', Flat_number='$flat', Floor_number='$floor', Price='$price', Available='$available', Photo='$imgPath', File='$pdfPath' where Flat_id=$flat_id";

     // inserting data into database
        $iQuery=mysqli_query($dbcon, $updateQuery);
        if($iQuery){
            unset($_SESSION['apartment_id']);
            unset($_SESSION['type']);
            unset($_SESSION['flat']);
            unset($_SESSION['floor']);
            unset($_SESSION['price']);

          echo "<script> alert('Data updated successfully...'); location.replace('show_flat.php'); </script>";           
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
                $updateQuery="update flat set Flat_id=$flat_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Type='$type', Flat_number='$flat', Floor_number='$floor', Price='$price', Available='$available', Photo='$imgPath', File='$pdfNewPath' where Flat_id=$flat_id";
            }
            else{
                echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
            } 
            // inserting data into database
        $iQuery=mysqli_query($dbcon, $updateQuery);
        if($iQuery){
            unset($_SESSION['apartment_id']);
            unset($_SESSION['type']);
            unset($_SESSION['flat']);
            unset($_SESSION['floor']);
            unset($_SESSION['price']);

          echo "<script> alert('Data updated successfully...'); location.replace('show_falt.php');</script>";           
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
          $updateQuery="update flat set Flat_id=$flat_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Type='$type', Flat_number='$flat', Floor_number='$floor', Price='$price', Available='$available', Photo='$imgNewPath', File='$pdfPath' where Flat_id=$flat_id";
        }
        else{
            // uploading pdf file with validation in upload_pdf folder

            $pdfName_explode=explode('.', $pdfFileName);
            $pdf_extension=strtolower(end($pdfName_explode));
            $valid_pdfExtension=array('pdf');
            if(in_array($pdf_extension, $valid_pdfExtension)){
                $pdfNewPath='../flat/upload_flat_pdf/'.$pdfFileName;
                move_uploaded_file($pdfFilePath, $pdfNewPath);
                $updateQuery="update apartment_info Flat_id=$flat_id, Admin_id=$admin_id, Apartment_id=$apartment_id, Type='$type', Flat_number='$flat', Floor_number='$floor', Price='$price', Available='$available', Photo='$imgNewPath', File='$pdfNewPath' where Flat_id=$flat_id"; 
            }
            else{
                echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
            }          
        }        
        // inserting data into database
        $iQuery=mysqli_query($dbcon, $updateQuery);
        if($iQuery){
          unset($_SESSION['apartment_id']);
            unset($_SESSION['type']);
            unset($_SESSION['flat']);
            unset($_SESSION['floor']);
            unset($_SESSION['price']);

            echo "<script> alert('Data updated successfully...'); location.replace('show_falt.php');</script>";
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
?>