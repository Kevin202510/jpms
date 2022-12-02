<?php 
 session_start();
include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 








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
            $_SESSION['FULLNAME'] = $data['user_fname']." ".$data['user_lname'];
        
            header("location: admin panel/applicantlist.php");
        }
        else if($data['user_role_id']==3){
            $_SESSION['USERROLE'] = $data['user_role_id'];
            $_SESSION['FULLNAME'] = $data['user_fname']." ".$data['user_lname'];
        
            header("location: admin panel/employerindex.php");
        }

        else{
            $_SESSION['USERROLE'] = $data['user_role_id'];
            $_SESSION['FULLNAME'] = $data['user_fname']." ".$data['user_lname'];
        
            header("location:  applicantinformation.php");
        }

    }
    
   
   

}   


    




if(isset($_POST['register'])) {	

    $user_fname = $crudapi->escape_string($_POST['user_fname']);
    $user_lname = $crudapi->escape_string($_POST['user_lname']);
    $user_contact = $crudapi->escape_string($_POST['user_contact']);
    $user_email = $crudapi->escape_string($_POST['user_email']);
    $address = $crudapi->escape_string($_POST['address']);
    $user_password  = $crudapi->escape_string($_POST['user_password']);
    $conuser_password  = $crudapi->escape_string($_POST['conuser_password']);
    $user_role_id  = $crudapi->escape_string($_POST['user_role_id']);

    if($user_password != $conuser_password){   
        echo '<script>alert("password did not match");</script>';
        // echo "<script type='text/javascript'>
        //       $(document).ready(function(){
        //       $('#exampleModalLong').modal('show');
        //          });
        //        </script>";

    }
    else{
        echo '<script>alert("password match");</script>';

                $hashed_password = md5($user_password);
                $result = $crudapi->execute("INSERT INTO users(user_fname,user_lname,user_contact,user_email,address,user_password,user_role_id) VALUES('$user_fname','$user_lname','$user_contact','$user_email','$address','$hashed_password',$user_role_id)");
      echo '<script>alert("REGISTERED SUCCESS");</script>';
      header("location:index.php");  

    }
    
    }   

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
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
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
                                <form action="joblisting.php" class="search-box" method="post">

                                    <div class="input-form"> 
                                        <input type="text" name="job_name" id="job_name" placeholder="Job Tittle ">
                                    </div>
                                    <div class="input-form">
                                        <input type="text" name="job_address" id="job_address" placeholder="Location">
                                    </div>

                                    <div class="search-form">
                                        <input type="Submit" name="findjobs" value="Find Jobs" class="btn head-btn21">
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
                            <span>FEATURED TOURS Packages</span>
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
                               <h5><a href="job_listing.html">Design & Creative</a></h5>
                                <span>(653)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-cms"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Design & Development</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-report"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Sales & Marketing</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-app"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Mobile Application</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-helmet"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Construction</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-high-tech"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Information Technology</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-real-estate"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Real Estate</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-content"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Content Writer</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="job_listing.html" class="border-btn2">Browse All Sectors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
         <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            
                             <a href="#" class="border-btn22">Upload your cv</a> 
                            <!-- <div class="openBtn"> -->
      <!-- <button class="border-btn2 openButton" onclick="openForm()"><strong>resume</strong></button> -->
      </main>


<!-- register MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                             <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">

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
                                 <label for="exampleInputPassword1">Address</label>
                                 <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" name="user_password" id="user_passwords" placeholder="Password" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Confirm Password</label>
                                 <input type="password" class="form-control" name="conuser_password" id="conuser_passwords" placeholder="Confirm Password" required>
                             </div>

                    
                        <label for="exampleInputPassword1">Role</label><br>
                        <select name="user_role_id" id="user_role_id" >
                        <option value="4">Applicant</option>
                            <option value="3">Employer</option>
                        </select>
                    
                     

                                <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary" id="subreg" name="register">REGISTERED</button>
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
                             <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
<!-- login MODAL -->


<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>

<script>
  $(document).ready(function(){
    $("#registers").click(function(){
        // $("#as_user_id").val($("user_id").val());
        $("#exampleModal").modal("show");
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
  })
  

 
</script>