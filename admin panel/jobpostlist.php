<?php session_start(); ?>
<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 

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
    header("location:job_post.php");
}
if(isset($_POST['Delete_user'])) {  

    $jobs_id = $crudapi->escape_string($_POST['jobs_id']);
      
    $result = $crudapi->execute("DELETE from jobs WHERE jobs_id = '$jobs_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:jobpostlist.php");
}       
?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>

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
          
          <div class="search-bar" style="float:right;">
                        <div class="search-form d-flex align-items-center" method="POST" action="#">
                          <input type="text" id="searchData" placeholder="Search By Company Name" style="width:200px;" title="Enter search keyword">
                         
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
                $query = "SELECT * FROM jobs";
                $result = $crudapi->getData($query);

                // var_dump($result);
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
                  
                  
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" style="background-color:transparent; color:blue; border:none;" id="view"><i class="bi bi-eye-fill"></i></button>
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-danger" style="background-color:transparent; color:red; border:none;" id="delete_btn"><i class="bi bi-trash-fill"></i></button>
                </div>
                     
              </td>
              </tr>
          <?php $number++; } }?>
        </tbody>
      </table>
</div>
</div>




<!-- ViewMODAL -->

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left: 470px; color:black;" class="modal-title" id="viewModalLabel">View Requarments</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
             
                <div class="modal-body" style="background-color:;">

        
                <!-- job post company Start -->
                <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->


                        <div class="single-job-items mb-50" style="">
                 
                            <div class="job-items">


                                    <div class="company-img">
                                    <a><img id="job_company_logoss" alt="" width="100" height="100"></a>
                                    </div>

                                <div class="job-tittle">
                                    
                                        <h4 id="job_company_namess"></h4>
                                   
                                    <ul>
                                        <i style="color:#78828d;" class="fa fa-user"></i> <li id="jobs_namess"></li>
                                        <i  style="color:#78828d;" class="fas fa-map-marker-alt"></i> <li id="jobs_addressss"></li>
                                        <i style="color:#78828d;" class="fas fa">PHP</i> <li id="job_expected_salaryss"></li>
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
                        <div class="post-details3  mb-50" style="">
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
                              <li>Application date : <span>12 Sep 2020</span></li>
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
                                <li>Contact: <span id="user_contact_ss"></span></li>
                                <li>Email: <span id="user_email_ss"></span></li>
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


<!-- delete -->
<div class="modal fade" id="delete_userModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:150px; color:black;" class="modal-title" id="deleteModalLabel">Delete Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_id_s">
                    <div class="modal-footer">
                    <button style="border-radius:20px; margin-right:10px; background-color:#28a745;" type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                    <button style="border-radius:20px; margin-right:150px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="Delete_user">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>
         <!-- ban delete -->




<?php include('layouts/footer.php'); ?>

<script>
   

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
            $("#job_company_logoss").attr("src",logo);
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
            $("#user_contact_ss").text(emp[0].user_contact);
            $("#user_email_ss").text(emp[0].user_email);
            
        });
        
        $("#viewModal").modal("show");

    });
 
    $("body").on('click','#delete_btn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#jobs_id_s").val(USER_ID_DELETE);
        $("#delete_userModal").modal("show");

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

     
</script>