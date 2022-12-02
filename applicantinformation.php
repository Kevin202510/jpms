<?php session_start(); ?>

<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
  <?php    
  include_once("admin panel/classes/CRUDAPI.php");
    $crudapi = new CRUDAPI(); ?>
    <main>
        <!-- Our Services Start -->
        <div class="our-services" style="margin-bottom:20px;">
            <div class="container">
                <div class="card" style="background-color:#20c997;">
                   <div class="card-body">
                 
              
                <div class="card" style="background-color:#c4eeef;">
                
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

                 <div class="card" style="background-color:#c4eeef;">
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
                            <div class="card" style="background-color:#c4eeef;">
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
                            <div class="card" style="background-color:#c4eeef;">
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
                            <div class="card" style="background-color:#c4eeef;">
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

    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>