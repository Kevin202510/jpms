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
            <th scope="col">Full NAme</th>
            <th scope="col">Address</th>
            <th scope="col">Salary</th>
             <tr>
            </thead>
            <tbody>
                <?php 
                     if(isset($_SESSION['USERROLE'])){
                      $jobapplicant= $_SESSION['USERID'];
                     $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id Left JOIN applicant_additional_info ON roles.id = users.user_role_id where users.user_role_id =$jobapplicant";
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
          <?php $number++; } } ?>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">          
<div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">VIEW JOB APPLICANT RESUME</h5>
                    <input type="button" value="Click Here" onclick="printDivContent()">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div id="printContent">
                <body style="align-items:center;">
  <div class="container justify-content-center">
    <div class="card justify-content-center">
      <div class="card-body" style="width:1105px; ">

      
    <header class="bg-primary bg-gradient text-white py-5">
      <div class="container">

      <?php 
              $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 4";
              $result = $crudapi->getData($query);
              $number = 1;
              foreach ($result as $key => $data) {
                ?>
        <div class="row">
          <div class="col-md-3 text-left text-md-center mb-3">
            <img class="rounded-circle img-fluid" src="https://i.pravatar.cc/175?img=32" alt="Profile Photo" />
          </div>
          <div class="col-md-9">
            <h1><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></h1>
            <p class="border-top pt-3"></p>
          </div>       
        </div>        
      </div>
    </header>
    <nav class="bg-dark text-white-50 mb-5">
      <div class="container">
          <div class="row p-3">
              
 
              <div class="col-md pb-2 pb-md-0" style="word-spacing: 260px;" >
              
                
                  <a href="#" class="text-white ml-2" style="text-decoration:none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16" >
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
              </svg><?php echo strtoupper($data["user_email"]) ?></a>
              
              
             
                
                  <a href="#" class="text-white ml-2" style="text-decoration:none;"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg><?php echo strtoupper($data["address"]) ?></a>
              
              
                  
                  <a href="#" class="text-white ml-2" style="text-decoration:none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg><?php echo strtoupper($data["user_contact"]) ?></a>
              </div> 
              
              <?php $number++; } ?>
          </div>
      </div>
    </nav>
    <main class="container">
      <div class="row">
        <div class="col-md mb-5">
          <h2 class="mb-5">Work Experience</h2>
          

          <?php 
         
         $query = "SELECT * FROM `applicant_experience` left join users on users.user_id = applicant_experience.ae_user_id where applicant_experience.ae_user_id=1";
            $result = $crudapi->getData($query);
             $number = 1;
          foreach ($result as $key => $data) {
        ?>

<h2 style="font-weight:bold;"><?php echo strtoupper($data['ae_companyname']); ?></h2>

                                            <ul>
                                                <li style="font-weight:bold;"><i  style="color:black;" class="fas fa-map-marker-alt"></i><?php echo strtoupper($data['ae_companyaddress']); ?></li>
                                                <li style="font-weight:bold;"><i  style="color:black;" class="fas fa-briefcase"></i><?php echo strtoupper($data['ae_position']); ?></li>
                                              <li style="font-weight:bold;"><p><i style="color:black;" class="fas fa-calendar"></i>( <?php echo strtoupper($data["ae_from"]).") (".strtoupper($data["ae_to"]) ?> )</p></li>
                                            </ul>

<?php }?>









        </div>
        <div class="col-md mb-5">
          <h2 class="mb-5">Education</h2>

          <?php 
         
         $query = "SELECT * FROM `applicant_educationbg` left join users on users.user_id = applicant_educationbg.aebg_user_id  where applicant_educationbg.aebg_user_id =1";
               $result = $crudapi->getData($query);
               $number = 1;
              foreach ($result as $key => $data) {
        ?>

<h3 style="font-weight:bold;"><?php echo strtoupper($data['aebg_school_name']); ?></h3>

</a>
<ul>
    <li style="color:black;"><i style="color:black;" class="fas fa-calendar"></i><?php echo strtoupper($data['aebg_year_graduate']); ?></li>
    <li style="color:black;"><i style="color:black;" class="fas fa-graduation-cap"></i><?php echo strtoupper($data['aebg_education_attainment_id']); ?></li>

</ul>

<?php }?>

          
          



        </div>     
      </div>    
      <div class="row">
        <div class="col-md mb-5">
          <h2 class="mb-5">Skills</h2>      
          
          <?php 
         
                                     $query = "SELECT * FROM `applicant_skills` left join users on users.user_id = applicant_skills.as_user_id where applicant_skills.as_user_id=1";
                                      $result = $crudapi->getData($query);
                                      $number = 1;
                                      foreach ($result as $key => $data) {
                                  ?>

<h2 style="color:black;"><?php echo strtoupper($data['as_skillname']); ?></h2>



<?php }?>


            
      </div>
    </main>
    </div>
    </div>
    </div>
  </body>
           
        </div>
                </div>
                </div>
            </div>
         </div>
         <?php }?>
<!-- View    -->

</div> 
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

function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var a = window.open('', '', 'height=400, width=400');
 	a.document.write('<html>');
 	a.document.write('<body>');
 	a.document.write(divElementContents);
 	a.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">');
 	a.document.write('</body></html>');
    a.document.close();
 	a.print();
}
</script>