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
                <h2 class="fw-bold mb-2 text-uppercase" style="color:green; font-weight:bold; ">Update Flat</h2>

                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                	<?php 
                	   $apt_id=$_COOKIE['apt_id'];
                  
                       $showQuery="select * from apartment_info where Apartment_id=$apt_id";
                       $upd_query=mysqli_query($dbcon, $showQuery);
                       $upd_info_Count=mysqli_num_rows($upd_query);
                  
                        if($upd_info_Count<1){
                          echo "<script> alert('Data Not Found in apartment_info database...');     location.replace('admin_show_info.php'); </script>";
                        }
                        else{    
                          $db_upd_data=mysqli_fetch_array($upd_query);
                          
                          $imgPath=$db_upd_data['Photo'];
                          $pdfPath=$db_upd_data['File'];
                        }
                    ?>
                    <label for=" address">ADDRESS</label>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src="https://img.icons8.com/material-sharp/24/000000/address.png" />
                                    </div>
                                </div>
                                <input type="text" name="address" id="address" placeholder="Enter Apartment Address"
                                    class="form-control form-control-md" value="<?php echo $db_upd_data['Place']; ?>" required />
                            </div>
                        </div>                                              
                    </div>                    
                    <div class="form-row">                                    
                       <div class="form-group col-md-6">
                            <label for="room">upload Picture of Building</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src="https://img.icons8.com/material-outlined/24/000000/camera.png" />
                                    </div>
                                </div>
                                <input type="file" name="img" class="form-control" id="img"
                                    placeholder="Image ">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">upload building file</label>
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
                    
                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
	$a_id=$_COOKIE['apt_id'];
  $admin_id=$_SESSION['admin_id'];

  $address=$_POST['address'];
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

  $_SESSION['up_address']=$address;
  

  if(($imgFileError!=0)&&($pdfFileError!=0)){
     $updateQuery="update apartment_info set Apartment_id=$a_id, Admin_id=$admin_id, Place='$address', Photo='$imgPath', File='$pdfPath' where Apartment_id=$apt_id";
     // inserting data into database

        $iQuery=mysqli_query($dbcon, $updateQuery);
        if($iQuery){
        	 unset($_SESSION['up_address']);          
          echo "<script> alert('Data updated successfully...'); location.replace('show_apartments.php'); </script>";           
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
                $pdfNewPath='../apartment/upload_pdf/'.$pdfFileName;
                move_uploaded_file($pdfFilePath, $pdfNewPath);
                $updateQuery="update apartment_info set Admin_id=$admin_id, Place='$address', Photo='$imgPath', File='$pdfNewPath' where Apartment_id=$apt_id";
            }
            else{
                echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
            } 
            // inserting data into database

        $iQuery=mysqli_query($dbcon, $updateQuery);
        if($iQuery){
          unset($_SESSION['address']);
          echo "<script> alert('Data updated successfully...'); location.replace('show_apartments.php');</script>";           
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
       $imgNewPath='../apartment/upload_img/'.$imgFileName;
       move_uploaded_file($imgFilePath, $imgNewPath);       
       if($pdfFileError!=0){
          $updateQuery="update apartment_info set Admin_id=$admin_id, Place='$address', Photo='$imgNewPath', File='$pdfPath' where Apartment_id=$apt_id";
        }
        else{
            // uploading pdf file with validation in upload_pdf folder

            $pdfName_explode=explode('.', $pdfFileName);
            $pdf_extension=strtolower(end($pdfName_explode));
            $valid_pdfExtension=array('pdf');
            if(in_array($pdf_extension, $valid_pdfExtension)){
                $pdfNewPath='../apartment/upload_pdf/'.$pdfFileName;
                move_uploaded_file($pdfFilePath, $pdfNewPath);
                $updateQuery="update apartment_info set Admin_id=$admin_id, Place='$address', Photo='$imgNewPath', File='$pdfNewPath' where Apartment_id=$apt_id";
            }
            else{
                echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
            }          
        }        
        // inserting data into database

        $iQuery=mysqli_query($dbcon, $updateQuery);
        if($iQuery){
          unset($_SESSION['address']);    
          echo "<script> alert('Data updated successfully...'); location.replace('show_apartments.php');</script>";
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