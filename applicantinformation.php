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
                <div class="card">
                    <div class="card-header">
                        MY PROFILE
                    </div>
                    <div class="card-body">


                  
                                <div class="card-body">
                                        <?php 
                                        $query = "SELECT * FROM `users` where user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                    <div class="card">
                                        <div class="card-header">
                                             
                                        </div>
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
                                    </div>
                                    <?php } ?>
                                </div>
                           





   <div class="card">
                                <div class="card-header">
                                Education
                                </div>
                                <div class="card-body">

                                <?php 
                                       $query = "SELECT * FROM `applicant_educationbg` where aebg_user_id = 1";
                                       $result = $crudapi->getData($query);
                                       foreach ($result as $key => $data) {
                                    ?>
                                    <div class="card">
                                        <div class="card-header"  style="text-align:center;">
                                        School Name <?php echo strtoupper($data["aebg_school_name"]) ?>
                                        </div>
                                        <div class="card-body"  style="text-align:center;">
                                            <p>
                                               
                                                Graduate year <?php echo strtoupper($data["aebg_year_graduate"]) ?><br>
                                                Attainment <?php echo strtoupper($data["aebg_education_attainment_id"]) ?>  <br>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>















                            <hr>

                            <div class="card">
                                <div class="card-header">
                                Education
                                </div>
                                <div class="card-body">

                                <?php 
                                       $query = "SELECT * FROM `applicant_educationbg` where aebg_user_id = 1";
                                       $result = $crudapi->getData($query);
                                       foreach ($result as $key => $data) {
                                    ?>
                                    <div class="card">
                                        <div class="card-header"  style="text-align:center;">
                                        School Name <?php echo strtoupper($data["aebg_school_name"]) ?>
                                        </div>
                                        <div class="card-body"  style="text-align:center;">
                                            <p>
                                               
                                                Graduate year <?php echo strtoupper($data["aebg_year_graduate"]) ?><br>
                                                Attainment <?php echo strtoupper($data["aebg_education_attainment_id"]) ?>  <br>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>



                          
                            <hr>
                            <div class="card">
                                <div class="card-header">
                                    EXPERIENCES
                                </div>
                                <div class="card-body">
                                        <?php 
                                        $query = "SELECT * FROM `applicant_experience` where ae_user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                    <div class="card">
                                        <div class="card-header"  style="text-align:center;">
                                            Company Name <?php echo strtoupper($data["ae_companyname"]) ?>
                                        </div>
                                        <div class="card-body"  style="text-align:center;">
                                            <p>
                                                Company Address <?php echo strtoupper($data["ae_companyaddress"]) ?> <br>
                                                Position <?php echo strtoupper($data["ae_position"]) ?><br>
                                                ( <?php echo strtoupper($data["ae_from"])." - ".strtoupper($data["ae_to"]) ?> )<br>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                         
                            <hr>
                            <div class="card">
                                <div class="card-header">
                                    Skills
                                </div>
                                <div class="card-body">
                                        <?php 
                                        $query = "SELECT * FROM `applicant_skills` where as_user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                    <div class="card">
                                        <div class="card-header">
                                            
                                        </div>
                                        <div class="card-body" style="text-align:center;">
                                            <p>
                                            Skills<?php echo strtoupper($data["as_skillname"]) ?> <br>
                                              
                                               
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <hr>
                            <div class="card">
                                <div class="card-header">
                                Applicant Additional Info
                                </div>
                                <div class="card-body">
                                        <?php 
                                        $query = "SELECT * FROM `applicant_additional_info` where aai_user_id = 1";
                                        $result = $crudapi->getData($query);
                                        foreach ($result as $key => $data) {
                                    ?>
                                    <div class="card">
                                        <div class="card-header">
                                            
                                        </div>
                                        <div class="card-body" style="text-align:center;">
                                            <p>
                                            Expected Salary<?php echo strtoupper($data["aai_expected_salary"]) ?> <br>
                                                 Preferrer Location<?php echo strtoupper($data["aai_location"]) ?> <br>
                                                Position Work<?php echo strtoupper($data["aai_wfh_os"]) ?><br>  
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
   

                          
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>