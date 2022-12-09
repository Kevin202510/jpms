<?php if(isset($_POST["logout"])){
  session_destroy();
  echo '<script>location.href="index.php";</script>';
}
 ?>




<?php
  //  include_once("admin panel/classes/CRUDAPI.php");
  //  $crudapi = new CRUDAPI();
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
                             <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>  
                           </div>

                        <div class="col-lg-9 col-md-12">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-md-block">
                                        <ul id="navigation" style="padding-left:0;">
                                        <li><a href="index2.php" >Home</a></li>
                                            <li><a href="applicantinformation.php" style="text-decoration: none;">My Profile</a></li>
                                            <li><a href="applicant_exp.php"style="text-decoration: none;">Experiences</a></li>
                                            <li><a href="applicant_educ.php"style="text-decoration: none;">Educations</a></li>
                                            <li><a href="applicant_skills.php"style="text-decoration: none;">Skills</a></li>
                                            <li><a href="applicant_add_info.php"style="text-decoration: none;">Additional Info</a></li>
                                           
                                           
                                            <?php if(isset($_SESSION['USERROLE'])){?>
    
    <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['FULLNAME'];?></a>
           <div class="dropdown-menu">
           <button type="button" class="dropdown-item d-flex align-items-center" id="profilebtn" data-id="<?php echo $_SESSION['USERID'];?>" style="float:right;">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
                </button>
           
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
        <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="logout">Logout</button>
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
        <div class="modal-header">
            <h5 class="modal-title" id="settingsLabel">Profile koto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">

      

          <input type="hidden" class="form-control" name="user_id" id="user_idzz">

          <center>  <div class="col-md-12 text-left text-md-center ">
            <img class="rounded-circle img-fluid" src="https://i.pravatar.cc/175?img=32" alt="Profile Photo" />
          </div></center>
                     <div style="text-align:center;">       
                            <h2 id="user_fnamezz"></h2>
                           
                                    <hr>
                              
                                    <ul style="text-align:left;">                               
                                      <i class="bi bi-telephone" style="font-size:30px;  background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="user_contactzz"></label><br><br>
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
        <div class="modal-header">
            <h5 class="modal-title" id="settingsLabel">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">

      

          <input type="hidden" class="form-control" name="user_id" id="user_idss">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_idss">

                    <center>  <div class="col-md-3 text-left text-md-center mb-3">
            <img class="rounded-circle img-fluid" src="assets/img/profile-img.jpg" alt="Profile Photo" />
          </div></center>

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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edituser">Update</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>
  

  <?php include("applicantsetting.php"); ?>