<?php session_start(); ?>
<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

    if(isset($_POST['addjobs'])) { 

        $target_dir = "../company_logo/";
        $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_SESSION['USERROLE'])){
     
            $jobs_user_id =  $_SESSION['USERID'];
             }
    
    $job_company_logo = $_FILES["filesToUpload"]["name"];    
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
    
     
    $result = $crudapi->execute("INSERT INTO jobs(job_company_logo,job_company_name,jobs_name,jobs_address,jobs_description,jobs_r_skills,jobs_r_education_id,jobs_preferred_time,jobs_r_experience,jobs_vacancy_count,job_expected_salary,jobs_user_id)VALUES('$job_company_logo','$job_company_name','$jobs_name','$jobs_address','$jobs_description','$jobs_r_skills','$jobs_r_education_id','$jobs_preferred_time','$jobs_r_experience','$jobs_vacancy_count','$job_expected_salary','$jobs_user_id')");
    
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }else{
        if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
            // header("location:applicantinformation.php");
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
    echo '<script>alert("ADDED SUCCESS");</script>';
    // echo '<script>window.reload();</script>';
}
     if(isset($_POST['editjob'])) {  

        $target_dir = "../company_logo/";
        $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $job_company_logo = $_FILES["filesToUpload"]["name"];    
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
    
      
    $result = $crudapi->execute("UPDATE jobs SET job_company_logo='$job_company_logo',job_company_name='$job_company_name',jobs_name='$jobs_name',jobs_address='$jobs_address',jobs_description='$jobs_description',jobs_r_skills='$jobs_r_skills',jobs_r_education_id=
        '$jobs_r_education_id',jobs_preferred_time='$jobs_preferred_time',jobs_r_experience='$jobs_r_experience',jobs_vacancy_count='$jobs_vacancy_count',job_expected_salary='$job_expected_salary'
     WHERE jobs_id = '$jobs_id' ");

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }else{
        if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
            // header("location:applicantinformation.php");
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
    
    echo '<script>alert("UPDATED SUCCESS");</script>';
    header("location:employerindex.php");
}
if(isset($_POST['deletejob'])) {  

    $jobs_id = $crudapi->escape_string($_POST['jobs_id']);
      
    $result = $crudapi->execute("DELETE from jobs WHERE jobs_id = '$jobs_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:employerindex.php");
}   




if(isset($_POST['Business_permit'])){

    $target_dir = "../cvs/";
    $target_file = $target_dir . basename($_FILES["filesToUploads"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $id = $_POST['user_id'];
    $profile = $_FILES["filesToUploads"]["name"];

    $query = "SELECT * FROM `requirements` where requirements_user_id=$id";
    $results = $crudapi->getData($query);

    if(count($results)!=0){
        $result = $crudapi->execute("UPDATE requirements SET requirements_filename='$profile' where requirements_user_id='$id'");
    }else{
        $result = $crudapi->execute("INSERT INTO requirements(requirements_filename,requirements_user_id) VALUES('$profile','$id')");
    }

    

    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
        header("location:employerindex.php");
    }else{
        if (move_uploaded_file($_FILES["filesToUploads"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
            header("location:employerindex.php");
        } else {
        // echo "Sorry, there was an error uploading your file.";
        header("location:employerindex.php");
        }
    }

    // if($newAPIFunctions){
    //     header("location:applicantinformation.php");
    // }else{
    //     echo '<script>alert("May Error!");</script>';
    // }
}else if(isset($_POST['uploadProfile'])){

    $target_dir = "profile/";
    $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $id = $_POST['user_id'];
    $profile = $_FILES["filesToUpload"]["name"];

    $result = $crudapi->execute("UPDATE `users` SET user_profile_img='$profile' WHERE user_id='$id' ");

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }else{
        if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
            header("location:applicantinformation.php");
        } else {
            header("location:applicantinformation.php");

        }
    }

    // if($newAPIFunctions){
    //     header("location:applicantinformation.php");
    // }else{
    //     echo '<script>alert("May Error!");</script>';
    // }
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
  font-size: 15px;
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
          <div class="search-bar">
            <div class="search-form d-flex align-items-center" method="POST" action="#">
             <input type="text" id="searchData" placeholder="Search By Company Name" style="width:200px;" title="Enter search keyword">
             <div class="custom-file col-6">
                    <button style="  margin-right:120px;" type="button" class="btn btn-success" data-id="<?php echo $_SESSION['USERID']; ?>" id="Business_permit">Business permit</button>
                    </div>
           </div>
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
            <th scope="col">Action</th>
             <tr>
            </thead>
            <tbody id="table-main">
                <?php 
                   if(isset($_SESSION['USERROLE'])){
                    $jobuser= $_SESSION['USERID'];
                $query = "SELECT * FROM `jobs` where jobs_user_id=$jobuser";
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
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" style="background-color:transparent; color:green; border:none;" id="editbtn"><i class="bi bi-pencil-fill"></i></button>
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-danger" style="background-color:transparent; color:red; border:none;" id="deletebtn"><i class="bi bi-trash-fill"></i></button>
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" style="background-color:transparent; color:blue; border:none;" id="view"><i class="bi bi-eye-fill"></i></button>
                  <button type="button" data-id="<?php echo $data['requirements_filename']; ?>" class="btn btn-primary" style="background-color:transparent; color:blue; border:none;" id="view_permit">Business permit</button>
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
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color: #28a745;">
                    <h5 Style="margin-left:490px; font-weight: bold;  color:black;" class="modal-title" id="exampleModalsLabel"> ADD JOB POST</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_id">
                    <input type="hidden" class="form-control" name="jobs_user_id" id="jobs_user_id">
                    <div class="row">
                    <div class="custom-file col-6">
                        <input type="file" class="custom-file-input" name="filesToUpload" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>

                   
                    </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="job_company_name" id="job_company_name" placeholder="Comapany Name" required>
                    </div>
               

                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="jobs_name" id="jobs_name" placeholder="Comapany Position" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-6">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="jobs_address" id="jobs_address" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Required Experience</label>
                        <input type="text" class="form-control" name="jobs_r_experience" id="jobs_r_experience" placeholder="Experience"required>
                    </div>
                    
                    </div> 
            <div class="row">
                    <div class="form-group  col-6">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea type="text" style="width:500px; height:120px;" class="form-control" name="jobs_description" id="jobs_description" placeholder="Description"required></textarea>
                    </div>
                   
                    <div class="form-group  col-6">
                        <label for="exampleInputPassword1">Skills</label>
                        <textarea type="text" style="width:500px;  height:120px;" class="form-control" name="jobs_r_skills" id="jobs_r_skills" placeholder="Skills"required></textarea>
                    </div>
             </div>
                    <div class="row">
                    <div class="form-group col-6">
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


                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Preferred Time</label>
                        <select name="jobs_preferred_time" id="jobs_preferred_time">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                              </select>
                            </div>
                              </div>

                    <div class="row">
                   
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="number" class="form-control" name="jobs_vacancy_count" id="jobs_vacancy_count" placeholder="Vacancy"required>
                    </div>
         
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" class="form-control" name="job_expected_salary" id="job_expected_salary" placeholder="Salary"required>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button  style="border-radius:20px; margin-right:10px; background-color:#28a745;"type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button style="border-radius:20px; margin-right:460px; background-color:#28a745;" type="submit" class="btn btn-primary" name="addjobs">ADD</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
         </div>
<!-- ADD  -->


<!-- UpdateMODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:490px; font-weight: bold;  color:black;" class="modal-title" id="exampleModalLabel">Edit Job Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
                </div>
                <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                <div class="custom-file">
                        <input type="file" class="custom-file-input" name="filesToUpload" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_ids">
                    <input type="hidden" class="form-control" name="jobs_user_id" id="jobs_user_ids">

                    <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="job_company_name" id="job_company_names" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="jobs_name" id="jobs_names" placeholder="Comapany Name" required>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="jobs_address" id="jobs_addresss" placeholder="Comapany Address"required>
                    </div>
                     
                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Experience</label>
                        <input type="text" class="form-control" name="jobs_r_experience" id="jobs_r_experiences" placeholder="Experience"required>
                    </div>
                   
                    </div>

                    <div class="row">
                    <div class="form-group col-6">
                    <label for="exampleInputPassword1" >Description</label>
                        <textarea style="width:500px; height:120px;" type="text" class="form-control" name="jobs_description" id="jobs_descriptions" placeholder="Description"required></textarea>
                    </div>

                    <div class="form-group  col-6">
                        <label for="exampleInputPassword1">Skills</label>
                        <textarea style="width:500px; height:120px;" type="text" class="form-control" name="jobs_r_skills" id="jobs_r_skillss" placeholder="Skills"required></textarea>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-6">
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
                     </div>

                        <div class="form-group  col-6">
                        <label for="exampleInputPassword1">Preferred Time</label>
                        <select name="jobs_preferred_time" id="jobs_preferred_times">

                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>

                         </select>
                        <!-- <input type="text" class="form-control" name="jobs_r_education_id" id="jobs_r_education_id" placeholder="Education"required> -->
                    </div>
                </div>

                <div class="row">
                   

                    <div class="form-group  col-6">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="number" class="form-control" name="jobs_vacancy_count" id="jobs_vacancy_counts" placeholder="Vacancy"required>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" class="form-control" name="job_expected_salary" id="job_expected_salarys" placeholder="Salary"required>
                    </div>
                    </div>

                
                
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:450px; 10px; background-color:#28a745;" type="submit" class="btn btn-primary" name="editjob">Update changes</button>
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
                <div class="modal-header" Style="background-color:#28a745;">
                    <h5 Style="margin-left:160px; font-weight: bold;  color:black;" class="modal-title" id="deleteModalLabel">Delete Job Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_idss">
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:150px; background-color:#28a745;" type="submit" class="btn btn-primary" name="deletejob">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>

<!-- delete -->

<!-- ViewMODAL -->

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header" Style="background-color:#28a745;">
                    <h5 style="margin-left:490px; font-weight: bold;  color:black" class="modal-title" id="viewModalLabel">View Job Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   
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
                            <a><img id="job_company_logos" alt="" width="100" height="100"></a>
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
                                   <li id="ea_name"></li>

                                   <li id="jobs_r_experiencess"></li>
                                   
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
                         <!-- <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                         </div> -->
                        
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                             
                            <ul>
                                <li>Name: <span id="full_namess"></span></li>
                                <li>Contact: <span id="user_contact_num"></span></li>
                                <li>Email: <span id="user_email_mail"></span></li>
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

<!-- upload -->
<div class="modal fade" id="example_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModal_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  Style="background-color:#28a745;">
        <h5  Style="color:black; margin-left:160px;" class="modal-title" id="exampleModal_Label">Business Permit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="Business_permit">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="filesToUploads" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01"></label>
              </div>
            </div>
        <div class="modal-footer">
        
          <button style="border-radius:20px; margin-right:160px; background-color:#28a745;" type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="example_Modals" tabindex="-1" role="dialog" aria-labelledby="example_ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example_ModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="user_id" id="idmoto">
            <input type="hidden" name="uploadProfile">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="filesToUpload" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- view business permit -->

<div class="modal fade" id="view_requarments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#28a745;">
        <h5 style="margin-left:130px; color:black;" class="modal-title" id="exampleModalLabel">VIEW REQUARMENTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
          </button>
        </div>
                    
        <div class="modal-body">

               
        <div>
              <div class="container">
                  <a type="button" id="cv_sz" style="width:100px; height:50px; color:black; margin-left:170px; text-align:center; background-color:#28a745;">CV</a> 
              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<!-- view permit -->  


<?php include('layouts/footer.php'); ?>

<script>
  $(document).ready(function(){
    $("#jobs").click(function(){
        $("#exampleModals").modal("show");
    });

    $("body").on('click','#view_permit',function(e){
  // alert($(e.currentTarget).data('id'));
  var filename = $(e.currentTarget).data('id');
  $("#cv_sz").prop("href", "sample.php?pdfname="+filename);
$("#view_requarments").modal("show");
});

    $("#Business_permit").click(function(e){
        var users_id = $(e.currentTarget).data('id');
        $("#user_id").val(users_id);
        $("#example_Modal").modal("show");
      });

      $("#uploadProfile").click(function(e){
        var users_id = $(e.currentTarget).data('id');
        $("#idmoto").val(users_id);
        $("#example_Modals").modal("show");
      });

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

        var USER_IDss = $(e.currentTarget).data('id');
        // alert(USER_IDss);
        $.post("update_jobs.php",{USER_IDsss: USER_IDss},function(data,status){
            var emp = JSON.parse(data);
            console.log(emp[0]);
            $("#jobs_idss").text(emp[0].jobs_id);
            let newdate = new Date(emp[0].created_at);
            var day = newdate.getDate();
            var month = newdate.getMonth() + 1;
            var year = newdate.getFullYear();
            let logo;
            logo = "../company_logo/"+emp[0].job_company_logo;
            $("#job_company_logos").attr("src",logo);
            $("#created_at").text(month+" / "+day+" / "+year);
            $("#jobs_user_idss").text(emp[0].jobs_user_id);
            $("#job_company_namess").text(emp[0].job_company_name);
            $("#jobs_namess").text(emp[0].jobs_name);
            $("#jobs_addressss").text(emp[0].jobs_address);
            $("#job_expected_salaryss").text(emp[0].job_expected_salary);
            $("#jobs_descriptionss").text(emp[0].jobs_description);
            $("#jobs_r_skillsss").text(emp[0].jobs_r_skills);
            $("#ea_name").text(emp[0].ea_name);
            $("#jobs_r_experiencess").text(emp[0].jobs_r_experience);
            $("#jobs_addresssss").text(emp[0].jobs_address);
            $("#jobs_vacancy_countss").text(emp[0].jobs_vacancy_count);
            $("#jobs_preferred_timess").text(emp[0].jobs_preferred_time);
            $("#job_expected_salarysss").text(emp[0].job_expected_salary);
            $("#full_namess").text(emp[0].user_fname + " " + emp[0].user_lname);
            $("#user_contact_num").text(emp[0].user_contact);
            $("#user_email_mail").text(emp[0].user_email);
            // alert("user_contactss");
        });  

        
        $("#viewModal").modal("show");

    });
    $("#searchData").keyup(function(){
        // alert("asd");
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchData");
    filter = input.value.toUpperCase();
    table = document.getElementById("table-main");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    });
  })



     
</script>