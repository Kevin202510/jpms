<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

  ?>

<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebaremployeer.php'); ?>


<style type="text/css">

body{
  color: #566787;
  background:#f5f5f5;
  font-family: 'varela round', Sans-seif;
  font-size: 13px;
}


    .table-wrapper{
background: #fff;
padding: 20px 25px;
margin: 30px 0;
border-radius: 3px;
box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title{

  padding-bottom: 15px;
  background: linear-gradient(to right, #14620b, #106ee3);
  color: #fff;
  padding: 16px 30px;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
}
  </style>

<div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-md-12">
           
          <h5><b>Post Jobs</b></h5>

          <div class="search-bar" style="float:right;">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
      </div>
          </div><!-- End Search Bar -->
         
          </div>
    </div>

       <table class="table table-striped table-hover">
            <thead>
              <tr>
              <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Address</th>
            <th scope="col">Salary</th>
             <tr>
            </thead>
            <tbody>
                <?php 
                     $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id Left JOIN applicant_additional_info ON roles.id = users.user_role_id where users.user_role_id = 4";
                     $result = $crudapi->getData($query);
                     $number = 1;
                     foreach ($result as $key => $data) {
                ?>
                 <tr>
                 <th scope="row"><?php echo $number; ?></th>
              
              <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
              <td><?php echo strtoupper($data["address"]) ?></td>
              <td><?php echo strtoupper($data["aai_expected_salary"]) ?></td>
         
              
                     <td>
              
              
                       <div class="items-link items-link2 f-right">
                       <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" id="view">View</button>
                          <button type="button" data-id="<?php echo $data['jobs_id']; ?>" id="editbtn" style="border: transparent; color: green; background: transparent;"><i class="bi bi-pencil-fill"></i></button>
                       <button type="button" data-id="<?php echo $data['jobs_id']; ?>" id="deletebtn" style="border: transparent; color: red; background: transparent;"> <i class="bi bi-trash-fill"></i></button>
                       </div>
                     
              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>

      <!-- ViewMODAL -->

<?php
         
         include_once("classes/CRUDAPI.php");
         $crudapi = new CRUDAPI(); 
         $query = "SELECT * FROM `jobs` left join users on users.user_id = jobs.jobs_id where jobs.jobs_id=1";
         $result = $crudapi->getData($query);
         $number = 1;
         foreach ($result as $key => $data) {
     ?>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View</h5>
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
                </div>
                </div>
            </div>
         </div>
         <?php }?>
<!-- View    -->


</div>
</div>


<?php include('layouts/footer.php'); ?>


<script>

$("body").on('click','#view',function(e){

var USER_IDs = $(e.currentTarget).data('id');
$.post("update_jobs.php",{USER_ID: USER_IDs},function(data,status){
    var emp = JSON.parse(data);
    $("#jobs_idss").val(emp[0].jobs_id);
    $("#jobs_user_idss").val(emp[0].jobs_user_id);
    $("#job_company_namess").val(emp[0].job_company_name);
    $("#jobs_namess").val(emp[0].jobs_name);
    $("#jobs_addressss").val(emp[0].jobs_address);
    $("#jobs_descriptionss").val(emp[0].jobs_description);
    $("#jobs_r_skillsss").val(emp[0].jobs_r_skills);
    $("#jobs_r_education_idss").val(emp[0].jobs_r_education_id);
    $("#jobs_preferred_timess").val(emp[0].jobs_preferred_time);
    $("#jobs_r_experiencess").val(emp[0].jobs_r_experience);
    $("#jobs_vacancy_countss").val(emp[0].jobs_vacancy_count);
    $("#job_expected_salaryss").val(emp[0].job_expected_salary);
    
});

$("#viewModal").modal("show");

});
</script>