<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/header.php'); ?>
    <main>


    <section class="section profile">

    <?php
         
         include_once("classes/CRUDAPI.php");
         $crudapi = new CRUDAPI(); 
         $query = "SELECT * FROM `jobs` left join users on users.user_id = jobs.jobs_id where jobs.jobs_id=1";
         $result = $crudapi->getData($query);
         $number = 1;
         foreach ($result as $key => $data) {
     ?>
   <!-- Hero Area Start-->
   <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>UI/UX Designer</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->



                     

                        <div class="single-job-items mb-50">
                 
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4><?php echo strtoupper($data['job_company_name']); ?></h4>
                                    </a>
                                    <ul>
                                        <li><?php echo strtoupper($data['jobs_name']); ?></li>
                                        <li><i class="fas fa-map-marker-alt"></i><?php echo strtoupper($data['jobs_address']); ?></li>
                                        <li><?php echo strtoupper($data['job_expected_salary']); ?></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p><?php echo strtoupper($data['jobs_description']); ?></p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <ul>
                                   <li>System Software Development</li>
                                   <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                   <li>Research and code , libraries, APIs and frameworks</li>
                                   <li>Strong knowledge on software development life cycle</li>
                                   <li>Strong problem solving and debugging skills</li>
                               </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <ul>
                                   <li>3 or more years of professional design experience</li>
                                   <li>Direct response email experience</li>
                                   <li>Ecommerce website design experience</li>
                                   <li>Familiarity with mobile and web apps preferred</li>
                                   <li>Experience using Invision a plus</li>
                               </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span>12 Aug 2019</span></li>
                              <li>Location : <span><?php echo strtoupper($data['jobs_address']); ?></span></li>
                              <li>Vacancy : <span><?php echo strtoupper($data['jobs_vacancy_count']); ?></span></li>
                              <li>Job nature : <span>Full time</span></li>
                              <li>Salary :  <span><?php echo strtoupper($data['job_expected_salary']); ?></span></li>
                              <li>Application date : <span>12 Sep 2020</span></li>
                          </ul>
                         <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                         </div>
                        
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span>Colorlib</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <ul>
                                <li>Name: <span><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></span></li>
                                <li>Cotact: <span><?php echo $data["user_contact"] ?></span></span></li>
                                <li>Email: <span><?php echo $data["user_email"] ?></span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- job post company End -->
        <?php }?>
        
    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>