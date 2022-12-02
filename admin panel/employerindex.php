<?php session_start(); ?>
<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

    if(isset($_POST['addjobs'])) { 

        if(isset($_SESSION['USERROLE'])){
     
            $jobs_user_id =  $_SESSION['USERID'];
             }
    
    $job_company_name = $crudapi->escape_string($_POST['job_company_name']);    
    $jobs_name = $crudapi->escape_string($_POST['jobs_name']);
    $jobs_address = $crudapi->escape_string($_POST['jobs_address']);
    $jobs_description = $crudapi->escape_string($_POST['jobs_description']);
    $jobs_r_skills = $crudapi->escape_string($_POST['jobs_r_skills']);
    $jobs_r_education_id = $crudapi->escape_string($_POST['jobs_r_education_id']);
    $jobs_preferred_time = $crudapi->escape_string($_POST['jobs_preferred_time']);
    $jobs_r_experience = $crudapi->escape_string($_POST['jobs_r_experience']);
    $jobs_vacancy_count = $crudapi->escape_string($_POST['jobs_vacancy_count']);
    $job_expected_salary = $crudapi->escape_string($_POST['job_expected_salary']);
    
      echo ('$jobs_user_id');
    $result = $crudapi->execute("INSERT INTO jobs(job_company_name,jobs_name,jobs_address,jobs_description,jobs_preferred_time,jobs_r_skills,jobs_r_education_id,jobs_r_experience,jobs_vacancy_count,job_expected_salary,jobs_user_id)VALUES('$job_company_name','$jobs_name','$jobs_address','$jobs_description','$jobs_r_skills','$jobs_r_education_id','$jobs_preferred_time','$jobs_r_experience','$jobs_vacancy_count','$job_expected_salary','$jobs_user_id')");
    
    echo '<script>alert("ADDED SUCCESS");</script>';
    // echo '<script>window.reload();</script>';
}
     if(isset($_POST['editjob'])) {  

    $jobs_id = $crudapi->escape_string($_POST['jobs_id']);
    $job_company_name = $crudapi->escape_string($_POST['job_company_name']);    
    $jobs_name = $crudapi->escape_string($_POST['jobs_name']);
    $jobs_address = $crudapi->escape_string($_POST['jobs_address']);
    $jobs_description = $crudapi->escape_string($_POST['jobs_description']);
    $jobs_r_skills = $crudapi->escape_string($_POST['jobs_r_skills']);
    $jobs_r_education_id = $crudapi->escape_string($_POST['jobs_r_education_id']);
    $jobs_preferred_time = $crudapi->escape_string($_POST['jobs_preferred_time']);
    $jobs_r_experience = $crudapi->escape_string($_POST['jobs_r_experience']);
    $jobs_vacancy_count = $crudapi->escape_string($_POST['jobs_vacancy_count']);
    $job_expected_salary = $crudapi->escape_string($_POST['job_expected_salary']);
    
      
    $result = $crudapi->execute("UPDATE jobs SET job_company_name='$job_company_name',jobs_name='$jobs_name',jobs_address='$jobs_address',jobs_description='$jobs_description',jobs_r_skills='$jobs_r_skills',jobs_r_education_id=
        '$jobs_r_education_id',jobs_preferred_time='$jobs_preferred_time',jobs_r_experience='$jobs_r_experience',jobs_vacancy_count='$jobs_vacancy_count',job_expected_salary='$job_expected_salary'
     WHERE jobs_id = '$jobs_id' ");
    
    echo '<script>alert("UPDATED SUCCESS");</script>';
    header("location:employerindex.php");
}
if(isset($_POST['deletejob'])) {  

    $jobs_id = $crudapi->escape_string($_POST['jobs_id']);
      
    $result = $crudapi->execute("DELETE from jobs WHERE jobs_id = '$jobs_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:employerindex.php");
}       
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
           
          <h5><b>Job Post</b></h5>
          <button type="button" class="btn btn-primary" id="jobs" style=" background-color:#28a745;  width:100px; float:right; border:none;">ADD</button>
          <div class="search-bar" style="">
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
            <th scope="col">Campany Name</th>
            <th scope="col">Position Name</th>
            <th scope="col">Address</th>
            <th scope="col">Vacancy</th>
            <th scope="col">Salary</th>
             <tr>
            </thead>
            <tbody>
                <?php 
                   if(isset($_SESSION['USERROLE'])){
                    $jobuser= $_SESSION['USERID'];
                $query = "SELECT * FROM `jobs` left join users on users.user_id = jobs.jobs_user_id where jobs.jobs_user_id=$jobuser";
                $result = $crudapi->getData($query);
                $number = 1;
                foreach ($result as $key => $data) {
                ?>
                 <tr>
                 <th scope="row"><?php echo $number; ?></th>
              <td><?php echo $data["job_company_name"] ?></td>
              <td><?php echo $data["jobs_name"] ?></td>
              <td><?php echo $data["jobs_address"] ?></td>
            
              <td><?php echo $data["jobs_vacancy_count"] ?></td>
              <td><?php echo $data["job_expected_salary"] ?></td>
         
              
                     <td>
              
              
                     <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" id="editbtn">EDIT</button>
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-danger" id="deletebtn">DELETE</button>
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" id="view">View</button>
                </div>
                     
              </td>
              </tr>
          <?php $number++; } }?>
        </tbody>
      </table>
</div>
</div>


<!-- ADDMODAL -->

            <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalsLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalsLabel"> ADD JOB POST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_id">
                    <input type="hidden" class="form-control" name="jobs_user_id" id="jobs_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="job_company_name" id="job_company_name" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="jobs_name" id="jobs_name" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="jobs_address" id="jobs_address" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" name="jobs_description" id="jobs_description" placeholder="Description"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Skills</label>
                        <input type="text" class="form-control" name="jobs_r_skills" id="jobs_r_skills" placeholder="Skills"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Education</label>
                        <select name="jobs_r_education_id" id="jobs_r_education_id">
                          <?php 
           
                              $query = "SELECT * FROM `education_attainment`";
                              $result = $crudapi->getData($query);
                              $number = 1;
                              foreach ($result as $key => $data) {
                          ?>
                          <option value="<?php echo $data['ea_id']; ?>"><?php echo $data['ea_name']; ?></option>
                        <?php }?>
                        </select>
                        <!-- <input type="text" class="form-control" name="jobs_r_education_id" id="jobs_r_education_id" placeholder="Education"required> -->
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Time</label>
                        <select name="jobs_preferred_time" id="jobs_preferred_time">

                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Experience</label>
                        <input type="text" class="form-control" name="jobs_r_experience" id="jobs_r_experience" placeholder="Experience"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="number" class="form-control" name="jobs_vacancy_count" id="jobs_vacancy_count" placeholder="Vacancy"required>
                    </div> 
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" class="form-control" name="job_expected_salary" id="job_expected_salary" placeholder="Salary"required>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addjobs">ADD</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
         </div>
<!-- ADD  -->


<!-- UpdateMODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_ids">
                    <input type="hidden" class="form-control" name="jobs_user_id" id="jobs_user_ids">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="job_company_name" id="job_company_names" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="jobs_name" id="jobs_names" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="jobs_address" id="jobs_addresss" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" name="jobs_description" id="jobs_descriptions" placeholder="Description"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Skills</label>
                        <input type="text" class="form-control" name="jobs_r_skills" id="jobs_r_skillss" placeholder="Skills"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Education</label>
                        <select name="jobs_r_education_id" id="jobs_r_education_ids">
                          <?php 
           
                              $query = "SELECT * FROM `education_attainment`";
                              $result = $crudapi->getData($query);
                              $number = 1;
                              foreach ($result as $key => $data) {
                          ?>
                          <option value="<?php echo $data['ea_id']; ?>"><?php echo $data['ea_name']; ?></option>
                        <?php }?>
                        </select>


                        <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Time</label>
                        <select name="jobs_preferred_time" id="jobs_preferred_time">

                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>

                         </select>
                        <!-- <input type="text" class="form-control" name="jobs_r_education_id" id="jobs_r_education_id" placeholder="Education"required> -->
                    </div>
                </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Experience</label>
                        <input type="text" class="form-control" name="jobs_r_experience" id="jobs_r_experiences" placeholder="Experience"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="number" class="form-control" name="jobs_vacancy_count" id="jobs_vacancy_counts" placeholder="Vacancy"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" class="form-control" name="job_expected_salary" id="job_expected_salarys" placeholder="Salary"required>
                    </div>

                
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editjob">Update changes</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div> 
         <!-- edit -->

         <!-- delete -->
         <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_idss">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="deletejob">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>

<!-- delete -->

<!-- ViewMODAL -->

<?php
         
         include_once("classes/CRUDAPI.php");
         $crudapi = new CRUDAPI(); 

         if(isset($_SESSION['USERROLE'])){
            $profile= $_SESSION['USERID'];
           $role=$_SESSION['USERROLE'];
          $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id =$role";
          $result = $crudapi->getData($query);  
          $number = 1;
         
          foreach ($result as $key => $data) {
            if(strtoupper($data["user_id"]) == $profile ){
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
         <?php } } } ?>
<!-- View    -->






<?php include('layouts/footer.php'); ?>

<script>
  $(document).ready(function(){
    $("#jobs").click(function(){
        $("#exampleModals").modal("show");
    });
  })

  $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("update_jobs.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#jobs_ids").val(emp[0].jobs_id);
            $("#jobs_user_ids").val(emp[0].jobs_user_id);
            $("#job_company_names").val(emp[0].job_company_name);
            $("#jobs_names").val(emp[0].jobs_name);
            $("#jobs_addresss").val(emp[0].jobs_address);
            $("#jobs_descriptions").val(emp[0].jobs_description);
            $("#jobs_r_skillss").val(emp[0].jobs_r_skills);
            $("#jobs_r_education_ids").val(emp[0].jobs_r_education_id);
            $("#jobs_preferred_times").val(emp[0].jobs_preferred_time);
            $("#jobs_r_experiences").val(emp[0].jobs_r_experience);
            $("#jobs_vacancy_counts").val(emp[0].jobs_vacancy_count);
            $("#job_expected_salarys").val(emp[0].job_expected_salary);
            
        });



        $("#editModal").modal("show");


    });


    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#jobs_idss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });


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