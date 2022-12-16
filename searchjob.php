<?php session_start(); ?>
<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->

    <?php include('applicantsviews/headerapplicant.php'); ?>
<?php 
include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 

       if(isset($_POST['applymoko'])) {	

        $job_app_job_id = $crudapi->escape_string($_POST['job_idss']);
        $job_app_user_id  = $crudapi->escape_string($_POST['user_id']);
        
          
        $result = $crudapi->execute("INSERT INTO job_applicants(job_app_job_id,job_app_user_id) VALUES('$job_app_job_id','$job_app_user_id')");
  
        echo '<script>alert("Apply SUCCESS");</script>';
        //  header("location: index2.php");
         echo '<script>location.href="index2.php";</script>';
       }


?>

    
    <!-- Preloader Start -->
    
    <main>

    
 <!-- Hero Area Start-->
 <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

      


        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    
                    <!-- Right content -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <!-- <span>39, 782 Jobs found</span> -->
                                            <!-- Select job items start -->
                                            <!-- <div class="select-job-items">
                                                <span>Sort by</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                </select>
                                            </div> -->
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
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
                                    if(isset($_POST['findjobs'])){
                                        $jn = "%".$_POST['job_name']."%";
                                        $ja = "%".$_POST['job_address']."%";
                                        $query = " SELECT * FROM `jobs` WHERE jobs_name LIKE '$jn' AND jobs_address LIKE '$ja' ";
                                     
                                        $result = $crudapi->getData($query);
                                        $number = 1;
                                        foreach ($result as $key => $data) { 
                                    
                                ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                    <div class="company-img">
                                    <?php if($data['job_company_logo']===NULL){ ?>
                                        <a><img src="assets/img/icon/job-list1.png" alt=""></a>
                                        <?php }else{?>
                                        <a><img src="company_logo/<?php echo $data['job_company_logo'] ?>" alt="" width="100" height="100"></a>
                                        <?php } ?>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                           
                                                <h4><?php echo strtoupper($data['job_company_name']); ?></h4>
                                            </a>
                                            <ul>
                                                <li><?php echo strtoupper($data['jobs_name']); ?></li>
                                                <li><i class="fas fa-map-marker-alt"></i><?php echo strtoupper($data['jobs_address']); ?></li>
                                                <li><?php echo strtoupper($data['job_expected_salary']); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <button style="border-radius:30px;" type="button" data-id=<?php echo $data['jobs_id'] ?> class="btn head-btn21" id="views_s">Apply</button>
                                        <?php
                                        // $eventTime = '2010-04-28 17:25:43';
                                        $time = strtotime($data['created_at']);
                                        // $times =
                                        // $time = strtotime('2022-12-14 12:00:00');
                                        ?>
                                        <span><?php echo humanTiming($time).' ago'; ?></span>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->




        <!-- Pagination Start 
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--Pagination End  -->


        <!--job list ViewMODAL -->

<div class="modal fade" id="view_s_Modal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:520px;" class="modal-title " id="viewModalLabel">View Post Job</h5>
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
                            <div class="company-img">
                            <a><img id="job_company_logozs" alt="" width="100" height="100"></a>
                            </div>
                                <div class="job-tittle">
                                   
                                        <h4 id="job_company_namess"></h4>
                                  
                                    <ul>
                                        <li id="jobs_namess"></li>
                                        <li id="jobs_addressss"></li>
                                        <li id="job_expected_salaryss"></li>
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
                                <p id="jobs_descriptionss"></p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <ul>
                                   <li id="jobs_r_skillsss"></li>
                                  
                               </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <ul>
                                   <li id="jobs_r_education_idss"></li>
                                   
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
                              <li>Posted date : <span id="created_at"></span></li>
                              <li>Location : <span id="jobs_addresssss"></span></li>
                              <li>Vacancy : <span id="jobs_vacancy_countss"></span></li>
                              <li>Job nature : <span id="jobs_preferred_timess"></span></li>
                              <li>Salary :  <span id="job_expected_salarysss"></span></li>
                            
                          </ul>
                         <div class="apply-btn2">
                         <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" style="color:fff; border:none;" id="applyjobs">Apply Now</button>
                         </div>
                        
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                             
                            <ul>
                                <li>Name: <span id="full_namess"></span></li>
                                <li>Cotact: <span id="user_contactss"></span></li>
                                <li>Email: <span id="user_emailss"></li>
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
<!-- View    -->



     <!-- apply MODAL -->
     <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                             <div class="modal-header " style="background-color:#1AA478; ">
                            <h5 style="margin-left:205px;" id="applyModalLabel">Apply</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">

                        <input type="hidden" class="form-control" name="user_id" id="user_id">

                            
                                 <input type="hidden" class="form-control" name="job_idss" id="job_app_job_id">
                            
                              
                                <div class="modal-footer" >
                                    
                            <button style="border-radius:20px;  margin-right:150px;" type="submit" class="btn " id="applyModals2" name="applymoko">Apply</button>
                                     
                                    </div>
                         </form>
                    </div>
                </div>
            </div>
         </div>
         <input type="hidden" id="idid">
         <input type="hidden" id="idss" value="<?php echo $_SESSION['USERID']; ?>">
<!-- apply MODAL -->



    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>



<script>
  $(document).ready(function(){
  
  $("#applyjobs").click(function(){
   
    $("#job_app_job_id").val($("#idid").val());
        $("#user_id").val($("#idss").val());
        // $("#job_app_job_id").val($("#idid").val());
        
 
        $("#applyModal").modal("show");
  });


  $("body").on('click','#views_s',function(e){
    //   alert("Asdasd");

var USER_IDss = $(e.currentTarget).data('id');
 //alert(USER_IDss);
$.post("admin panel/update_jobs.php",{USER_IDsss: USER_IDss},function(data,status){
    var emp = JSON.parse(data);
    // console.log(emp[0]);
    $("#idid").val(emp[0].jobs_id);
    let newdate = new Date(emp[0].created_at);
    var day = newdate.getDate();
    var month = newdate.getMonth() + 1;
    var year = newdate.getFullYear();

    $("#created_at").text(month+" / "+day+" / "+year);
    $("#jobs_user_idss").text(emp[0].jobs_user_id);

    let logo; 
    if(emp[0].job_company_logo==null){
        logo = "assets/img/icon/job-list1.png";
    }else{
        logo = "company_logo/"+emp[0].job_company_logo;
    }
    $("#job_company_logozs").attr("src",logo);
    $("#job_company_namess").text(emp[0].job_company_name);
    $("#jobs_namess").text(emp[0].jobs_name);
    $("#jobs_addressss").text(emp[0].jobs_address);
    $("#job_expected_salaryss").text(emp[0].job_expected_salary);
    $("#jobs_descriptionss").text(emp[0].jobs_description);
    $("#jobs_r_skillsss").text(emp[0].jobs_r_skills);
    $("#jobs_r_education_idss").text(emp[0].ea_name);
    $("#jobs_addresssss").text(emp[0].jobs_address);
    $("#jobs_vacancy_countss").text(emp[0].jobs_vacancy_count);
    $("#jobs_preferred_timess").text(emp[0].jobs_preferred_time);
    $("#job_expected_salarysss").text(emp[0].job_expected_salary);
    $("#full_namess").text(emp[0].user_fname + " " + emp[0].user_lname);
    $("#user_contactss").text(emp[0].user_contact);
    $("#user_emailss").text(emp[0].user_email);
    
});

$("#view_s_Modal").modal("show");

});
});


 
</script>