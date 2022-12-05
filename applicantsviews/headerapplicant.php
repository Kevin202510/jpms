    
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
                                            <li><a href="applicantinformation.php" style="text-decoration: none;">My Profile</a></li>
                                            <li><a href="applicant_exp.php"style="text-decoration: none;">Experiences</a></li>
                                            <li><a href="applicant_educ.php"style="text-decoration: none;">Educations</a></li>
                                            <li><a href="applicant_skills.php"style="text-decoration: none;">Skills</a></li>
                                            <li><a href="applicant_add_info.php"style="text-decoration: none;">Additional Info</a></li>
                                            <?php if(isset($_SESSION['USERROLE'])){?>
                                                 <li><a href="applicant_add_info.php" style="text-decoration: none;"> <span class="text-truncate"><?php echo  $_SESSION['FULLNAME'];?></span> </a></li>
                                                 <li class="nav-item dropdown pe-3">

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