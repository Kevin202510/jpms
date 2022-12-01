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
           
          <h5><b>Applicant</b></h5>

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
            <th scope="col">Contact</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            
             <tr>
            </thead>
            <tbody>
                <?php 
                     $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 4";
                     $result = $crudapi->getData($query);
                     $number = 1;
                     foreach ($result as $key => $data) {
                ?>
                 <tr>
                 <th scope="row"><?php echo $number; ?></th>
              
              <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
              <td><?php echo strtoupper($data["user_contact"]) ?></td>
              <td><?php echo strtoupper($data["user_email"]) ?></td>
         
              
                     <td>
              
              
                       <div class="items-link items-link2 f-right">
                       <button type="button" data-id="<?php echo $data['jobs_id']; ?>" id="editbtn" style="border: transparent; color: blue; font-size:15px; background: transparent;"><i class="bi bi-eye-fill"></i></button>
                        
                       </div>
                     
              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
</div>
</div>


<?php
         
         include_once("classes/CRUDAPI.php");
         $crudapi = new CRUDAPI(); 
         $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 4";
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

                 <!-- Our Services Start -->
        <div class="our-services" style="margin-bottom:20px;">
            <div class="container">
                <div class="card" style="background-color:#20c997;">
                   <div class="card-body">

              
                <div class="card" style="background-color:#F1CBFF;">
                                <div class="card-header">
                                  MY PROFILE
                                </div>
                     <div class="card-body">
                                    
                                <?php 
                                       
                                       $query = "SELECT * FROM `users` where user_id = 1";
                                       $result = $crudapi->getData($query);
                                       foreach ($result as $key => $data) {
                                 ?>
                                   
                           
                                        
                                <div class="card-body">
                                        <p>
                                     <div class="form-group">
                                               <img style="width:200px; " src="profiles/limboprofile.webp">
                                     </div>


                                          <div class=form-group >
                                             Full Name <?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?> <br>
                                             Address <?php echo strtoupper($data["address"]) ?><br>
                                             Contact<?php echo strtoupper($data["user_contact"]) ?> <br>
                                             Email<?php echo strtoupper($data["user_email"]) ?><br> 

                                         </div> 
                                        </p>
                                   
                                </div>
                             
                       <?php } ?>
                     </div>
                </div>
     

                <hr>

                 <div class="card" style="background-color:#F1CBFF;">
                           <div class="card-header">
                               EDUCATION
                           </div>
                     <div class="card-body">
        
                        <?php 
                           $query = "SELECT * FROM `applicant_educationbg` where aebg_user_id = 1";
                           $result = $crudapi->getData($query);
                           foreach ($result as $key => $data) {
                        ?>
              
            
                        <div class="card-body"  style="text-align:center;">
                           <p>
                               School Name <?php echo strtoupper($data["aebg_school_name"]) ?> <br>
                               Attainment <?php echo strtoupper($data["aebg_education_attainment_id"])?>  <br>
                               Graduate year <?php echo strtoupper($data["aebg_year_graduate"]) ?>
                           </p>
                       </div>
        
                <?php } ?>
             </div>
           </div>
  
                            <hr>
                            <div class="card" style="background-color:#F1CBFF;">
                                <div class="card-header">
                                    EXPERIENCES
                                </div>
                                <div class="card-body">
                                    
                                        <?php 
                                        $query = "SELECT * FROM `applicant_experience` where ae_user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                
                                      

                                        <div class="card-body"  style="text-align:center;">
                                            <p>
                                            Company Name <?php echo strtoupper($data["ae_companyname"]) ?>
                                                Company Address <?php echo strtoupper($data["ae_companyaddress"]) ?> <br>
                                                Position <?php echo strtoupper($data["ae_position"]) ?><br>
                                                ( <?php echo strtoupper($data["ae_from"])." - ".strtoupper($data["ae_to"]) ?> )<br>
                                            </p>
                                        </div>
                                    
                                    <?php } ?>
                                </div>
                            </div>

                         
                            <hr>
                            <div class="card" style="background-color:#F1CBFF;">
                                <div class="card-header">
                                    Skills
                                </div>
                                <div class="card-body">
                                   
                                        <?php 
                                        $query = "SELECT * FROM `applicant_skills` where as_user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                   
                                        <div class="card-body" style="text-align:center;">
                                            <p>
                                            Skills<?php echo strtoupper($data["as_skillname"]) ?> <br>
                                              
                                               
                                            </p>
                                        </div>
                                    
                                    <?php } ?>
                                </div>
                            </div>


                            <hr>
                            <div class="card" style="background-color:#F1CBFF;">
                                <div class="card-header">
                                Applicant Additional Info
                                </div>
                                <div class="card-body">
                                        <?php 
                                        $query = "SELECT * FROM `applicant_additional_info` where aai_user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                   
                                        
                                        <div class="card-body" style="text-align:center;">
                                            <p>
                                            Expected Salary<?php echo strtoupper($data["aai_expected_salary"]) ?> <br>
                                                 Preferrer Location<?php echo strtoupper($data["aai_location"]) ?> <br>
                                                Position Work<?php echo strtoupper($data["aai_wfh_os"]) ?><br>  
                                            </p>
                                        </div>
                                    
                                    <?php } ?>
                                </div>
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