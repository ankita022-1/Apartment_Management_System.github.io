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
                <h2 class="fw-bold mb-2 text-uppercase" style="color:green; font-weight:bold; ">ADD Apartment</h2>

                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
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
                                    class="form-control form-control-md" value="<?php if(isset($_SESSION['address'])){echo $_SESSION['address'];} ?>" required />
                            </div>
                        </div>                        
                                              
                    </div>                
            
                    <div class="form-row">                                    
                       <div class="form-group col-md-6">
                            <label for="room">upload Picture of Building</label>
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
                    
                    <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
  $db_admin_id=$_SESSION['admin_id'];

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

  $_SESSION['address']=$address;

  if($imgFileError!=0){
     echo "<script> alert('Error in uploading image...'); </script>"; 
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
          $insertQuery="insert into  apartment_info(Admin_id, Place, Photo) values($db_admin_id, '$address', '$imgNewPath') ";
        }
        else{
            // uploading pdf file with validation in upload_pdf folder   

            $pdfName_explode=explode('.', $pdfFileName);
            $pdf_extension=strtolower(end($pdfName_explode));
            $valid_pdfExtension=array('pdf');
            if(in_array($pdf_extension, $valid_pdfExtension)){
                $pdfNewPath='../apartment/upload_pdf/'.$pdfFileName;
                move_uploaded_file($pdfFilePath, $pdfNewPath);
                $insertQuery="insert into  apartment_info(Admin_id, Place, Photo, File) values($db_admin_id, '$address', '$imgNewPath', '$pdfNewPath') ";
            }
            else{
                echo "<script> alert('ERROR... only pdf file can be uploaded'); </script>";
            }          
        }        
        // inserting data into database

        $iQuery=mysqli_query($dbcon, $insertQuery);
        if($iQuery){
          echo "<script> alert('Data inserted successfully...'); location.replace('show_apartments.php');</script>"; 
          unset($_SESSION['address']);
        }
        else{
          echo "<script> alert('ERROR... Data is not inserted.'); </script>";
        }  
    } 
    else{
        echo "<script> alert('ERROR... Image extension should be png, jpg or jpeg.'); </script>";        
    }   
  }   
}
?>

