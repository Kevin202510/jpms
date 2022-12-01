    
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

                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="applicantinformation.php">My Profile</a></li>
                                            <li><a href="applicant_exp.php">Experiences</a></li>
                                            <li><a href="applicant_educ.php">Educations</a></li>
                                            <li><a href="applicant_skills.php">Skills</a></li>
                                            <li><a href="applicant_add_info.php">Additional Info</a></li>
                                            <?php if(isset($_SESSION['USERROLE'])){?>
                                                 <li><a href="applicant_add_info.php"> <?php echo  $_SESSION['FULLNAME'];?></a></li>
                                           
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