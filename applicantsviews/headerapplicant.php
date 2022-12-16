
<?php if(isset($_POST["logout"])){
  session_destroy();
  echo '<script>location.href="index.php";</script>';
}
 ?>


<?php
include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 



if(isset($_POST['edituser'])) {	

$user_id  = $crudapi->escape_string($_POST['user_id']);
$user_fname = $crudapi->escape_string($_POST['user_fname']);
$user_lname = $crudapi->escape_string($_POST['user_lname']);
$user_contact = $crudapi->escape_string($_POST['user_contact']);
$user_email = $crudapi->escape_string($_POST['user_email']);
$address = $crudapi->escape_string($_POST['address']);  
    
  $result = $crudapi->execute("UPDATE users SET user_fname='$user_fname',user_lname='$user_lname',user_contact='$user_contact',user_email='$user_email',address='$address' WHERE user_id = '$user_id' ");
  
  echo '<script>alert("UPDATED SUCCESS");</script>';
  echo '<script>location.href="applicantinformation.php";</script>';
  // header("location:applicantinformation.php");
}else if(isset($_POST['verifyEmail'])){
  $user_id  = $crudapi->escape_string($_POST['user_id']);
  $user_email = $crudapi->escape_string($_POST['user_email']);
  $verification_code = $crudapi->escape_string($_POST['verification_code']);

  $timestamp = time();
  $formatted = date('y-m-d h:i:s T', $timestamp);
  
  $result = $crudapi->execute("UPDATE users SET email_verified_at='$formatted' WHERE user_id='$user_id' and verification_code='$verification_code'");
  echo '<script>location.href="applicantinformation.php";</script>';

}



if(isset($_POST['uploadCV'])){

  $target_dir = "cvs/";
  $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $id = $_POST['user_id'];
  $profile = $_FILES["filesToUpload"]["name"];

  $result = $crudapi->execute("INSERT INTO requirements(requirements_filename,requirements_user_id) VALUES('$profile','$id')");

  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }else{
      if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
          header("location:applicantinformation.php");
      } else {
      echo "Sorry, there was an error uploading your file.";
      }
  }

  // if($newAPIFunctions){
  //     header("location:applicantinformation.php");
  // }else{
  //     echo '<script>alert("May Error!");</script>';
  // }
}else if(isset($_POST['uploadProfile'])){

  $target_dir = "profile/";
  $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $id = $_POST['user_id'];
  $profile = $_FILES["filesToUpload"]["name"];

  $result = $crudapi->execute("UPDATE `users` SET user_profile_img='$profile' WHERE user_id='$id' ");

  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }else{
      if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
          header("location:applicantinformation.php");
      } else {
          header("location:applicantinformation.php");

      }
  }

  // if($newAPIFunctions){
  //     header("location:applicantinformation.php");
  // }else{
  //     echo '<script>alert("May Error!");</script>';
  // }
}


?>

<header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                          <div class="col-lg-3 col-md-2">
                             <!-- Logo -->
                             <!-- <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>   -->
                           </div>

                        <div class="col-lg-9 col-md-12">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-md-block">
                                        <ul id="navigation" style="padding-left:0;">
                                            <li><a href="index2.php" style="text-decoration: none;">Home</a></li>
                                            <li><a href="joblist.php" style="text-decoration: none;">Job List</a></li>
                                            



              <li class="nav-item dropdown"  >
           <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
           <div class="dropdown-menu" >
         
              
           
                <a href="applicantinformation.php" style="text-decoration: none;  " class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>My Profile</span>
                </a>

              <a href="applicant_exp.php"style="text-decoration: none;" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Experiences</span>
                </a>

                <a href="applicant_educ.php"style="text-decoration: none;" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Educations</span>
                </a>

              <a href="applicant_skills.php"style="text-decoration: none;" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Skills</span>
                </a>

                <a href="applicant_add_info.php"style="text-decoration: none;" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Additional Info</span>
                </a>
              
           </div>
      </li>


     
                                            <li><a href="view_my_jobs.php"style="text-decoration: none;">View My Jobs</a></li>
                           
                                            <?php if(isset($_SESSION['USERROLE'])){?>
    
    <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['FULLNAME'];?></a>
           <div class="dropdown-menu">
           <button type="button" class="dropdown-item d-flex align-items-center" id="profilebtn" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
                </button>

                
              <?php if(isset($_SESSION['isVerify'])!=" "){ ?>
            <button type="button" class="dropdown-item d-flex align-items-center" id="Verification" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Verify Email</span>
              </button>
              <?php } ?>
              <!-- </a> -->
         

            
          
                <button type="button" class="dropdown-item d-flex align-items-center" id="settings" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Settings</span>
              </button>

              <button type="button" class="dropdown-item d-flex align-items-center" id="outnako" style="float:right;">
                <i class="bi bi-box-arrow-right"></i>
                <span>LogOut</span>
              </button>
              
           </div>
      </li>
 
      <?php }?>
                                                 
 
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                       
                                     </div>
                                  </div>
                                </div>
                             <!-- Mobile Menu -->
                             <div class="col-12">
                             <div class="mobile_menu d-block d-lg-none"></div>
                             </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>

    <!-- logout -->
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
            <h5 style="margin-left:200px; color:black;" class="modal-title" id="logoutLabel">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <div class="modal-footer">
                <button style="border-radius:20px; margin-right:10px; background-color:#28a745;"  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="border-radius:20px; margin-right:75px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="logout">Logout</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>


  <!-- profile -->

  <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="settingsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
            <h5 style="margin-left:200px;" class="modal-title" id="settingsLabel">Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
        </div>
        <div class="modal-body">
        <form method="POST">

        <?php 
               if(isset($_SESSION['USERROLE'])){
                $profile= $_SESSION['USERID'];
               $role=$_SESSION['USERROLE'];
              $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id =$role";
              $result = $crudapi->getData($query);  
              $number = 1;
             
              foreach ($result as $key => $data) {
                if(strtoupper($data["user_id"]) == $profile ){
                ?>

          <input type="hidden" class="form-control" name="user_id" id="user_idzz">

          <center>  <div class="col-md-12 text-left text-md-center ">
          <img class="rounded-circle" src="profile/<?php echo $data["user_profile_img"];?>" alt="Profile Photo" width="150" height="150" />
          </div></center>
                     <div style="text-align:center;">       
                            <h2 id="user_fnamezz"></h2>

                                    <hr>
                              
                                    <ul style="text-align:left;">                               
                                      <i class="bi bi-telephone-fill" style="font-size:30px;  background:; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="user_contactzz"></label><br><br>
                                      <i class="bi bi-envelope circle-icon" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"></i><label style="font-size:20px;" id="user_emailzz"></label><br><br>
                                      <i class="bi bi-geo-alt" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="addresszz"></label>
                                      
                                    </ul>

                       </div>       
                     </div>              
             </form>
           
        </div>
        </div>
    </div>
  </div>

   <!-- settings -->

   <div class="modal fade" id="editusers" tabindex="-1" role="dialog" aria-labelledby="settingsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
            <h5  style="margin-left:200px; color:black;" class="modal-title" id="settingsLabel">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <form method="POST">

          <input type="hidden" class="form-control" name="user_id" id="user_id_ss">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_idss">

                   
                    <div class="form-group">
                                 <label for="exampleInputPassword1">First Name</label>
                                 <input type="text" class="form-control" name="user_fname" id="user_fnamess"  required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name</label>
                                 <input type="text" class="form-control" name="user_lname" id="user_lnamess" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Contact</label>
                                 <input type="number" class="form-control" name="user_contact" id="user_contactss" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_emailss"  required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Address</label>
                                 <input type="text" class="form-control" name="address" id="addressss"  required>
                             </div>
           

            <div class="modal-footer">
                <button style="border-radius:20px; margin-right:10px; background-color:#28a745;"  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="border-radius:20px; margin-right:75px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="edituser">Update</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>
  <?php }}} ?>

<!-- upload profile -->

  <div class="modal fade" id="uploadModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="uploadCV.php" enctype="multipart/form-data">
            <input type="text" name="user_id" id="user_ids">
            <input type="hidden" name="uploadProfile">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="filesToUpload" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- upload profile -->

<div class="modal fade" id="verification" tabindex="-1" role="dialog" aria-labelledby="verificationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
            <h5 style="margin-left:190px; font-weight: bold;  color:black;" class="modal-title" id="verificationLabel">Profile koto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
        </div>


        <div class="modal-body" >
        <form method="POST">
                      

                     <input type="text" class="form-control" name="user_id" id="user_id_z">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" readonly class="form-control" name="user_email" id="user_email_z" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Verification</label>
                        <input type="text" class="form-control" name="verification_code" id="Verification_code_z" placeholder="Verification" required>
                    </div>
                    <div class="modal-footer">
               
               <button style="border-radius:20px; margin-right:190px; background-color:#28a745;" type="submit" class="btn btn-primary" name="verifyEmail">save</button>
           </div>
        </form>
        </div>
        </div>
    </div>
  </div>


  <?php include("applicantsetting.php"); ?>