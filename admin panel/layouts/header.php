
<?php
session_start();


include_once("./classes/CRUDAPI.php");
$crudapi = new CRUDAPI();


?>


<?php if(isset($_POST['edituser'])) {	

$user_id  = $crudapi->escape_string($_POST['user_id']);
$user_fname = $crudapi->escape_string($_POST['user_fname']);
$user_lname = $crudapi->escape_string($_POST['user_lname']);
$user_contact = $crudapi->escape_string($_POST['user_contact']);
$user_email = $crudapi->escape_string($_POST['user_email']);
$address = $crudapi->escape_string($_POST['address']);  
    
  $result = $crudapi->execute("UPDATE users SET user_fname='$user_fname',user_lname='$user_lname',user_contact='$user_contact',user_email='$user_email',address='$address' WHERE user_id = '$user_id' ");
  
  echo '<script>alert("UPDATED SUCCESS");</script>';
  header("location:applicantlist.php");
}
else if(isset($_POST["logout"])){
  session_destroy();
  header("location:../index.php");
}



if(isset($_SESSION['USERROLE'])){

  if($_SESSION['USERROLE'] == 1){
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
                      header("location:applicantlist.php");
                  } else {
                  echo "Sorry, there was an error uploading your file.";
                  }
              }

              // if($newAPIFunctions){
              //     header("location:applicantinformation.php");
              // }else{
              //     echo '<script>alert("May Error!");</script>';
              // }
            }else if(isset($_POST['upload_Profile'])){

              $target_dir = "../profile/";
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
                      header("location:applicantlist.php");
                  } else {
                    header("location:applicantlist.php");

                  }
              }

              // if($newAPIFunctions){
              //     header("location:applicantinformation.php");
              // }else{
              //     echo '<script>alert("May Error!");</script>';
              // }
            }

            // ///////////////////////////////////////////////////////////////////////////////////
  }


  
  if($_SESSION['USERROLE'] == 2){
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
              header("location:applicantlist.php");
          } else {
          echo "Sorry, there was an error uploading your file.";
          }
      }

      // if($newAPIFunctions){
      //     header("location:applicantinformation.php");
      // }else{
      //     echo '<script>alert("May Error!");</script>';
      // }
    }else if(isset($_POST['upload_Profile'])){

      $target_dir = "../profile/";
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
              header("location:applicantlist.php");
          } else {
            header("location:applicantlist.php");

          }
      }

      // if($newAPIFunctions){
      //     header("location:applicantinformation.php");
      // }else{
      //     echo '<script>alert("May Error!");</script>';
      // }
    }

    // ///////////////////////////////////////////////////////////////////////////////////
}



if($_SESSION['USERROLE'] == 3){
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
            header("location:employerindex.php");
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

    // if($newAPIFunctions){
    //     header("location:applicantinformation.php");
    // }else{
    //     echo '<script>alert("May Error!");</script>';
    // }
  }else if(isset($_POST['upload_Profile'])){

    $target_dir = "../profile/";
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
            header("location:employerindex.php");
        } else {
          header("location:employerindex.php");

        }
    }

    // if($newAPIFunctions){
    //     header("location:applicantinformation.php");
    // }else{
    //     echo '<script>alert("May Error!");</script>';
    // }
  }

  // ///////////////////////////////////////////////////////////////////////////////////
}







}



?>
<header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#1AA478;">
  
    <div class="d-flex align-items-center justify-content-between fw-bold ">
      
        
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block" style="color:#3d4d4b; font-size:30px;" >ADMIN</span>
      
      <i class="bi bi-list toggle-sidebar-btn" style="margin-left:138px;"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img id="profileimg" alt="Profile" class="rounded-circle" width="40" height="40">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo  $_SESSION['FULLNAME'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo  $_SESSION['FULLNAME'];?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <input type="hidden" id="profilekoto" value="<?php echo $_SESSION['USERID'];?>">
              
            <li>
            <button type="button" class="dropdown-item d-flex align-items-center" id="profilebtn" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
                </button>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
             
            <li>
            <button type="button" class="dropdown-item d-flex align-items-center" id="Verification" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Verification</span>
              </button>
              </a>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>



            <li>
            <button type="button" class="dropdown-item d-flex align-items-center" id="settings" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Settings</span>
              </button>
              </a>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
            <button type="button" class="dropdown-item d-flex align-items-center" id="outnako" style="float:right;">
                <i class="bi bi-box-arrow-right"></i>
                <span>LogOut</span>
              </button>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
<!-- logout -->
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header"  style="background-color:#28a745;">
            <h5 style="margin-left:200px;" class="modal-title" id="logoutLabel">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <div class="modal-footer">
                <button style="border-radius:20px; margin-right:10px; background-color:#28a745;" type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="border-radius:20px; margin-right:140px; background-color:#28a745;" type="submit"  class="btn btn-secondary" name="logout">Logout</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>



    <!-- verification -->

  <div class="modal fade" id="verification" tabindex="-1" role="dialog" aria-labelledby="verificationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
            <h5 style="margin-left:190px;" class="modal-title" id="verificationLabel">Profile koto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="modal-body" >
        <form method="POST">
                      

                     <input type="hidden" class="form-control" name="user_id" id="user_id_z">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" name="user_email" id="user_email_z" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Verification</label>
                        <input type="text" class="form-control" name="verification_code" id="Verification_code_z" placeholder="Verification" required>
                    </div>

        </form>
        </div>
        </div>
    </div>
  </div>




  <!-- profile -->

  <div class="modal fade" id="profilez" tabindex="-1" role="dialog" aria-labelledby="settingsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
            <h5 style="margin-left:190px;" class="modal-title" id="settingsLabel">Profile koto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="modal-body" >
        <form method="POST">

      

          <input type="hidden" class="form-control" name="user_id" id="user_idz">

        <div class="col-md-12 text-left text-md-center ">
       <img id="profileimgs" alt="Profile" class="rounded-circle" width="150" height="150">
          </div>
                     <div style="text-align:center;">       
                            <h2 id="user_fnamez"></h2>
                           
                                    <hr>
                              
                                    <ul style="text-align:left;">                               
                                      <i class="bi bi-telephone" style="font-size:30px;  background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="user_contactz"></label><br><br>
                                      <i class="bi bi-envelope circle-icon" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"></i><label style="font-size:20px;" id="user_emailz"></label><br><br>
                                      <i class="bi bi-geo-alt" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="addressz"></label>
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
        <div class="modal-header"  style="background-color:#28a745;">
            <h5 style="margin-left:200px;" class="modal-title" id="settingsLabel">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">

      

                    <input type="hidden" class="form-control" name="user_id" id="user_idss">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_idss">

                            <center><div class="col-md-3 text-left text-md-center mb-3">
                            <img id="profileimgszz" alt="Profile" class="rounded-circle" width="150" height="150">
      
                            <br><br>
                            <button style="float:right; margin-right:30px;" type="button" class="btn btn-success" data-id="<?php echo $_SESSION['USERID']; ?>" id="upload_Profiles">Profile</button>
                          </div></center><br><br>

                      
                          <div class="form-group">
                                 <label for="exampleInputPassword1">First Name</label>
                                 <input type="text" class="form-control" name="user_fname" id="user_fnamess" placeholder="First Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name</label>
                                 <input type="text" class="form-control" name="user_lname" id="user_lnamess" placeholder="Last Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Contact</label>
                                 <input type="number" class="form-control" name="user_contact" id="user_contactss" placeholder="Contact" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_emailss" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Address</label>
                                 <input type="text" class="form-control" name="address" id="addressss" placeholder="Address" required>
                             </div>
           

            <div class="modal-footer">
                <button style="border-radius:20px; margin-right:10px; background-color:#28a745;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="border-radius:20px; margin-right:150px; background-color:#28a745;" type="submit" class="btn btn-primary" name="edituser">Update</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>

 <!-- upload profile -->

 <div class="modal fade" id="uploadModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"  enctype="multipart/form-data">
            <input type="text" name="user_id" id="user_ids">
            <input type="hidden" name="upload_Profile">
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