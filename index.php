<?php 
 session_start();
include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if (isset($_POST['login'])) {

    $username= $_POST['user_email'];
    $passin= $_POST['user_password'];


    $hashed_password = md5($passin);
    // echo $hashed_password;
  
    $query = "SELECT * FROM `users` where user_email='$username' AND user_password = '$hashed_password'";
    $result = $crudapi->getData($query);

    foreach ($result as $key => $data) {

    

        if($data['user_role_id']==1 || $data['user_role_id']==2){
            $_SESSION['USERROLE'] = $data['user_role_id'];
            $_SESSION['USERID'] = $data['user_id'];
            $_SESSION['isVerify'] = $data['email_verified_at'];
            $_SESSION['FULLNAME'] = $data['user_fname']." ".$data['user_lname'];
        
            header("location: admin panel/applicantlist.php");
        }
        else if($data['user_role_id']==3){
            $_SESSION['USERROLE'] = $data['user_role_id'];
            $_SESSION['USERID'] = $data['user_id'];
            $_SESSION['isVerify'] = $data['email_verified_at'];
            $_SESSION['FULLNAME'] = $data['user_fname']." ".$data['user_lname'];
        
            header("location: admin panel/employerindex.php");
        }

        else{
            $_SESSION['USERROLE'] = $data['user_role_id'];
            $_SESSION['isVerify'] = $data['email_verified_at'];
            $_SESSION['FULLNAME'] = $data['user_fname']." ".$data['user_lname'];
            $_SESSION['USERID'] = $data['user_id'];
        
            header("location:  applicantinformation.php");
        }
    }
}   


if(isset($_POST['subreg'])) {	

    $user_fname = $crudapi->escape_string($_POST['user_fname']);
    $user_lname = $crudapi->escape_string($_POST['user_lname']);
    $user_contact = $crudapi->escape_string($_POST['user_contact']);
    $user_email = $crudapi->escape_string($_POST['user_email']);
    $address = $crudapi->escape_string($_POST['address']);
    $user_password  = $crudapi->escape_string($_POST['user_password']);
    $conuser_password  = $crudapi->escape_string($_POST['conuser_password']);
    $user_role_id  = $crudapi->escape_string($_POST['user_role_id']);

    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'reyjohnpaullimbo18@gmail.com';

        //SMTP password
        $mail->Password = 'vybkifiixfuboytw';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('reyjohnpaullimbo18@gmail.com', 'GT JOB HUNT');

        //Add a recipient
        $mail->addAddress($user_email, $user_fname);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b><a href="http://localhost/palasresort/email-verification.php?email="' . $user_email.'">VERIFY MY ACCOUNT</a></p>';

        $mail->send();
        // echo 'Message has been sent';
                $hashed_password = md5($user_password);
                $result = $crudapi->execute("INSERT INTO users(user_fname,user_lname,user_contact,user_email,address,user_password,user_role_id,verification_code) VALUES('$user_fname','$user_lname','$user_contact','$user_email','$address','$hashed_password',$user_role_id,'$verification_code')");
        header("location: index.php");
    exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    }   

    if(isset($_POST['jobapply'])) {	

        $job_app_job_id = $crudapi->escape_string($_POST['job_idss']);
        $job_app_user_id  = $crudapi->escape_string($_POST['user_id']);
        
          
        $result = $crudapi->execute("INSERT INTO job_applicants(job_app_job_id,job_app_user_id) VALUES('$job_app_job_id','$job_app_user_id')");
  
        echo '<script>alert("Apply SUCCESS");</script>';
         header("location: index.php");

       }

    
    // if(isset($_POST['apply'])) {	

    //     $job_app_job_id = $crudapi->escape_string($_POST['job_app_job_id']);
    //     $job_app_user_id  = $crudapi->escape_string($_POST['job_app_user_id ']);
        
          
    //     $result = $crudapi->execute("INSERT INTO users(job_app_job_id,job_app_user_id) VALUES('$job_app_job_id','$job_app_user_id')");
  
    //     echo '<script>alert("Apply SUCCESS");</script>';
    //     header("location: index.php");



?>



<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/header.php'); ?>
    
    <main>



        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero3.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find Your Dream Job</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-6">
                           
                                <!-- form -->
                                <form action="searchjob1.php" class="search-box" method="post">

                                    <div class="input-form"> 
                                        <input style="border-radius:30px;" type="text" name="job_name" id="job_name" placeholder="Job Tittle ">
                                    </div>
                                    <div class="input-form">
                                        <input style="border-radius:30px;" type="text" name="job_address" id="job_address" placeholder="Location">
                                    </div>
                                    <div class="search-form">
                                        <input style="border-radius:30px;" type="Submit" name="findjobs" value="Find Jobs" class="btn head-btn21">
                                    </div>  
                                </form> 
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->

        <div class="our-services section-pad-t30">
    <div class="container">



        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    
                    <h2>Jobs</h2>
                </div>
            </div>
        </div>
        <div class="col">
        <?php 
         
         include_once("classes/CRUDAPI.php");
         $crudapi = new CRUDAPI(); 

         date_default_timezone_set('Asia/Manila');

         function humanTiming ($time){ 

            $time = time() - $time; // to get the time since that moment
            $time = ($time<1)? 1 : $time;
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );

            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }

        }

             $query = "SELECT * FROM `jobs` LIMIT 10";
             $result = $crudapi->getData($query);
             $number = 1;
             foreach ($result as $key => $data) { 
         
        ?>
        <div class="single-job-items mb-30">
            <div class="job-items">
                <div class="company-img">
                    <?php if($data['job_company_logo']===NULL){ ?>
                    <a href="#"><img src="assets/img/icon/1.gif" alt=""></a>
                    <?php }else{?>
                    <a><img src="company_logo/<?php echo $data['job_company_logo'] ?>" alt="" width="100" height="100"></a>
                    <?php } ?>
                </div>
                <div class="job-tittle job-tittle2">
                   
                        <h4><?php echo strtoupper($data['job_company_name']); ?></h4>
                    </a>
                    <ul>

                        <li> <i style="color:#78828d;" class="fa fa-user"></i> <?php echo strtoupper($data['jobs_name']); ?></li>
                        <li><i  style="color:#78828d;" class="fas fa-map-marker-alt"></i></i><?php echo strtoupper($data['jobs_address']); ?></li>
                        <li><i  style="color:#78828d;" class="fas fa">PHP</i><?php echo strtoupper($data['job_expected_salary']); ?></li>
                    </ul>
                </div>
            </div>
            <div class="items-link items-link2 f-right">
                <!-- <a href="job_details.php">Full Time</a> -->
                <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" style="border-radius:30px; color:black; border:none;" id="view_s"><i class="bi bi-eye-fill"></i>View</button>
                <?php
                // $eventTime = '2010-04-28 17:25:43';
                $time = strtotime($data['created_at']);
                // $times =
                // $time = strtotime('2022-12-14 12:00:00');
                ?>
                <span><?php echo humanTiming($time).' ago'; ?></span>
            </div>
        </div>
        <?php }?>
        </div>
        <!-- More Btn -->
        <!-- Section Button -->
        
    </div>
</div>

<!-- How  Apply Process Start-->
<div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle white-text text-center">
                    <span>Apply process</span>
                    <h2> How it works</h2>
                </div>
            </div>
        </div>
        <!-- Apply Process Caption -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-search"></span>
                    </div>
                    <div class="process-cap">
                        <h5>1. Search a job</h5>
                    <p>Search a Job you love and you will never have to work a day in your life</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-curriculum-vitae"></span>
                    </div>
                    <div class="process-cap">
                        <h5>2. Apply for job</h5>
                    <p>It's time to start living the life we've imagined</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-tour"></span>
                    </div>
                    <div class="process-cap">
                        <h5>3. Get your job</h5>
                    <p>I never dreamed about success. I worked for it</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How  Apply Process End-->
<div class="our-services section-pad-t30">
    <div class="container">



        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    
                    <h2>Browse Top Categories </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-contnet-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-tour"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Design & Creative</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-cms"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Design & Development</h5>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-report"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Sales & Marketing</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-app"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Mobile Application</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-helmet"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Construction</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-high-tech"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Information Technology</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-real-estate"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Real Estate</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-content"></span>
                    </div>
                    <div class="services-cap">
                        <h5>Content Writer</h5>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- More Btn -->
        <!-- Section Button -->
        
    </div>
</div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
         <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/personal.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            
                             <!-- <a href="#" class="border-btn22">Upload your cv</a>  -->
                            <!-- <div class="openBtn"> -->
      <!-- <button class="border-btn2 openButton" onclick="openForm()"><strong>resume</strong></button> -->
      </main>




<!-- register MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                             <div class="modal-header" style="background-color:#1AA478;">
                              <h5 style="margin-left:200px;" class="modal-title" id="exampleModalLabel">Register</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">

                        <input type="hidden" class="form-control" name="user_id" id="user_id">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_id">

                             <div class="form-group">
                                 <label for="exampleInputPassword1">First Name</label>
                                 <input type="text" class="form-control" name="user_fname" id="user_fname" placeholder="First Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name</label>
                                 <input type="text" class="form-control" name="user_lname" id="user_lname" placeholder="Last Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Contact</label>
                                 <input type="number" class="form-control" name="user_contact" id="user_contact" placeholder="Contact" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 
                        <label for="exampleInputPassword1">Address</label><br>
                        <select name="address" id="address">
                            <option value="Padolina General Tinio Nueva Ecija">Padolina General Tinio Nueva Ecija</option>
                            <option value="Concepion General Tinio Nueva Ecija">Concepion General Tinio Nueva Ecija</option>
                            <option value="Rio Chico General Tinio Nueva Ecija">Rio Chico General Tinio Nueva Ecija</option>
                            <option value="Pias General Tinio Nueva Ecija">Pias General Tinio Nueva Ecija</option>
                            <option value="Nazareth General Tinio Nueva Ecija">Nazareth General Tinio Nueva Ecija</option>
                            <option value="Bago General Tinio Nueva Ecija">Bago General Tinio Nueva Ecija</option>
                            <option value="Poblacion west General Tinio Nueva Ecija">Poblacion west General Tinio Nueva Ecija</option>
                            <option value="Poblacion East General Tinio Nueva Ecija">Poblacion East General Tinio Nueva Ecija</option>
                            <option value="Poblacion Central General Tinio Nueva Ecija">Poblacion Central General Tinio Nueva Ecija</option>
                            <option value="San Pedro General Tinio Nueva Ecija">San Pedro General Tinio Nueva Ecija</option>
                            <option value="Sampaguita General Tinio Nueva Ecija">Sampaguita General Tinio Nueva Ecija</option>
                            <option value="Pulong Matong General Tinio Nueva Ecija">Pulong Matong General Tinio Nueva Ecija</option>
                            <option value="Palale General Tinio Nueva Ecija">Palale General Tinio Nueva Ecija</option>
                            </select>
                            </div><br><br>
                            

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Confirm Password</label>
                                 <input type="password" class="form-control" name="conuser_password" id="conuser_password" placeholder="Confirm Password" required>
                             </div>

                             <label for="exampleInputPassword1">role</label><br>
                             <select name="user_role_id" id="user_role_id">
                                 <option value="4">Applicant</option> 
                                 <option value="3">Employer</option> 
                            </select><br><br>

                            
                                <div class="modal-footer">
                                     <button style="border-radius:20px; margin-right:10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button style="border-radius:20px; margin-right:50px;"type="submit" class="btn btn-primary" name="subreg">REGISTERED</button>
                               </div>
                         </form>
                    </div>
                </div>
            </div>
         </div>
<!-- register MODAL -->


<!-- login MODAL -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                             <div class="modal-header" style="background-color:#1AA478;">
                              <h5 style="margin-left:210px;" class="modal-title" id="exampleModalLabel">LogIn</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" name="user_password" id="user_passwords" placeholder="Password" required><input type='checkbox' id='check' />
                             </div>


                                <div class="modal-footer" >
                                <button style="border-radius:20px; margin-right:10px;" type="button" class="btn head-btn1" id="registerss">Register</button>
                                     <button style="border-radius:20px; margin-right:70px;" type="submit" class="btn btn-primary" name="login">LOGIN</button>
                               </div>
                         </form>
                    </div>
                </div>
            </div>
         </div>
<!-- login MODAL -->

<!-- logout MODAL -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                             <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">LogOut</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">

                        <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
                             </div>

                                <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary" name="login">LOGIN</button>
                               </div>
                         </form>
                    </div>
                </div>
            </div>
         </div>
<!-- logout MODAL -->


<!-- view -->

<div class="modal fade" id="view_Modalz" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="color:black; margin-left:500px;"class="modal-title" id="viewModalLabel">View Jobs Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             
                <div class="modal-body">

                <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->


                        <div class="single-job-items mb-50">
                 
                        <div class="job-items">
                               
                                <a><img id="job_company_logo" alt="" width="100" height="100"></a>
                                
                           
                          
                                <div class="job-tittle">
                                    
                                        <h4 id="job_company_namesszz"></h4>
                                   
                                    <ul>
                                    <i style="color:#78828d;" class="fa fa-user"></i> <li id="jobs_namesszz"></li>
                                        <i  style="color:#78828d;" class="fas fa-map-marker-alt"></i> <li id="jobs_addresssszz"></li>
                                        <i style="color:#78828d;" class="fas fa">PHP</i> <li id="job_expected_salarysszz"></li>
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
                                <p id="jobs_descriptionsszz"></p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <ul>
                                   <li id="jobs_r_skillssszz"></li>
                                  
                               </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <ul>
                                   <li id="ea_namezz"></li>

                                   <li id="jobs_r_experiencesszz"></li>
                                   
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
                              <li>Posted date : <span id="created_atzz"></span></li>
                              <li>Location : <span id="jobs_addressssszz"></span></li>
                              <li>Vacancy : <span id="jobs_vacancy_countsszz"></span></li>
                              <li>Job nature : <span id="jobs_preferred_timesszz"></span></li>
                              <li>Salary :  <span id="job_expected_salaryssszz"></span></li>
                              
                          </ul>
                         <div class="apply-btn2">
                         <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" style="color:fff; border:none;" id="applys">Apply Now</button>
                            
                         </div>
                        
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                             
                            <ul>
                                <li>Name: <span id="full_namesszz"></span></li>
                                <li>Contact: <span id="user_contactsszz"></span></li>
                                <li>Email: <span id="user_emailsszz"></span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
       
        </div>
        
                  </div>
              
                </div>
            </div>
         </div>


       

       <!-- apply MODAL -->
     <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                             <div class="modal-header " style="background-color:#1AA478;">
                            <h5 style="margin-left:180px;" id="applyModalLabel">LogIn First</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">
                     
  

                                <div class="modal-footer" style="background-color:#13e9a5;">
                                    
                            <button style="border-radius:20px;  margin-right:130px;" type="submit" class="btn" href="index.php">Please LogIn</button>
                                     
                                    </div>
                         </form>
                    </div>
                </div>
            </div>
         </div>
         <input type="hidden" id="idid">
         <input type="hidden" id="idss" value="<?php echo $_SESSION['USERID']; ?>">
<!-- apply MODAL -->



<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>

<script>
  $(document).ready(function(){
    $("#registerss").click(function(){
        $("#exampleModal2").modal("hide");
        const startmona = setTimeout(function() { 
                                openmona()
                            }, 1000);
        
    });
    function openmona(){
        $("#exampleModal").modal("show");
    }

    $("#registers").click(function(){
        // $("#as_user_id").val($("user_id").val());
        $("#exampleModal").modal("show");
    });


    $("#applys").click(function(){
        // $("#as_user_id").val($("user_id").val());
          // alert(job_app_job_idz)
        $("#job_app_job_idz").val($("#idid").val());
        $("#user_idz").val($("#idss").val());
       


        $("#applyModal").modal("show");
    });




    $("#logins").click(function(){
        // $("#as_user_id").val($("user_id").val());
        $("#exampleModal2").modal("show");
    });
    $("#subreg").prop("disabled",true);
    $("#conuser_passwords").change(function(){
        if ($("#user_passwords").val()==$("#conuser_passwords").val()){
            $("#subreg").prop("disabled",false);
        }else{
            alert("PASSWORD DIDN'T MATCH");
        }
    });

    $("body").on('click','#view_s',function(e){

var USER_IDss = $(e.currentTarget).data('id');
//  alert(USER_IDss);
$.post("admin panel/update_jobs.php",{USER_IDsss: USER_IDss},function(data,status){
    var emp = JSON.parse(data);
    console.log(emp[0]);
    $("#jobs_idss").text(emp[0].jobs_id);
    let newdate = new Date(emp[0].created_at);
    var day = newdate.getDate();
    var month = newdate.getMonth() + 1;
    var year = newdate.getFullYear();

    $("#created_atzz").text(month+" / "+day+" / "+year);
    $("#jobs_user_idss").text(emp[0].jobs_user_id);
    let logo; 
    if(emp[0].job_company_logo==null){
        logo = "assets/img/icon/job-list1.png";
    }else{
        logo = "company_logo/"+emp[0].job_company_logo;
    }
    $("#job_company_logo").attr("src",logo);
    $("#job_company_namesszz").text(emp[0].job_company_name);
    $("#jobs_namesszz").text(emp[0].jobs_name);
    $("#jobs_addresssszz").text(emp[0].jobs_address);
    $("#job_expected_salarysszz").text(emp[0].job_expected_salary);
    $("#jobs_descriptionsszz").text(emp[0].jobs_description);
    $("#jobs_r_skillssszz").text(emp[0].jobs_r_skills);
    $("#ea_namezz").text(emp[0].ea_name);
    $("#jobs_r_experiencesszz").text(emp[0].jobs_r_experience);
    $("#jobs_addressssszz").text(emp[0].jobs_address);
    $("#jobs_vacancy_countsszz").text(emp[0].jobs_vacancy_count);
    $("#jobs_preferred_timesszz").text(emp[0].jobs_preferred_time);
    $("#job_expected_salaryssszz").text(emp[0].job_expected_salary);
    $("#full_namesszz").text(emp[0].user_fname + " " + emp[0].user_lname);
    $("#user_contactsszz").text(emp[0].user_contact);
    $("#user_emailsszz").text(emp[0].user_email);
    // alert("user_contactss");
});  


$("#view_Modalz").modal("show");

});


  })
  

 
</script>