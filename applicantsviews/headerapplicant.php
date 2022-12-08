



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
                                        <li><a href="index.php" >Home</a></li>
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

                 
                            
                            <h4 id="user_fnamezz"></h4>
                                    </a>
                                    <ul>
                                        <li id="addresszz"></li>
                                        <li id="user_contactzz"></li>
                                        <li id="user_emailzz"></li>
                                    </ul>

           
        </form>
        </div>
        </div>
    </div>
  </div>

  <?php include("applicantsetting.php"); ?>