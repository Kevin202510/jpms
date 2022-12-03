<?php session_start(); ?>

<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
  <?php    
  include_once("admin panel/classes/CRUDAPI.php");
    $crudapi = new CRUDAPI(); ?>
    <main>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  </head>
  <input type="button" value="Click Here" onclick="printDivContent()">
  <body style="align-items:center;">
 
  <div class="container justify-content-center">
 
    <div class="card justify-content-center">
    
      <div class="card-body" style="width:1105px; ">
      <div id="printContent">
    
      
    <header class="bg-primary bg-gradient text-white py-5">
      <div class="container">
      <?php 
               if(isset($_SESSION['USERROLE'])){
                $profile= $_SESSION['USERID'];
               $role=$_SESSION['USERROLE'];
              $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id =$role";
              $result = $crudapi->getData($query);  
              $number = 1;
             
              foreach ($result as $key => $data) {
                if(strtoupper($data["user_id"]) == $profile ){
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
              
                  

                 

              <div class="col-md pb-2 pb-md-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
              </svg>
                
                  <a href="#" class="text-white ml-2"><?php echo strtoupper($data["user_email"]) ?></a>
              </div>
          
              <div class="col-md text-md-center pb-2 pb-md-0">
              
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>
                
                  <a href="#" class="text-white ml-2"><?php echo strtoupper($data["address"]) ?></a>
              </div>       
              <div class="col-md text-md-right">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg>
                  
                  <a href="#" class="text-white ml-2"> <?php echo strtoupper($data["user_contact"]) ?></a>
              </div> 
              
              <?php }}} ?>
          </div>
      </div>
    </nav>
    
      <div class="row">
        <div class="col-md mb-5">
          <h2 class="mb-5">Work Experience</h2>
          

          <?php 
         
          if(isset($_SESSION['USERROLE'])){
            $appexp= $_SESSION['USERID'];
         $query = "SELECT * FROM `applicant_experience` left join users on users.user_id = applicant_experience.ae_user_id where applicant_experience.ae_user_id=$appexp";
            $result = $crudapi->getData($query);
             $number = 1;
          foreach ($result as $key => $data) {
        ?>

            <h2 style="font-weight:bold; font-size:20px;"><?php echo strtoupper($data['ae_companyname']); ?></h2>
            <div style="word-spacing: 30px;">
                <i style="color:black; font-weight:bold;" class="fas fa-map-marker-alt"></i><?php echo strtoupper($data['ae_companyaddress']); ?>
                <i style="color:black; font-weight:bold;" class="fas fa-briefcase"></i><?php echo strtoupper($data['ae_position']); ?>
                <i style="color:black; font-weight:bold;" class="fas fa-calendar"></i> (<?php echo strtoupper($data["ae_from"]).") (".strtoupper($data["ae_to"]) ?> )
          </div>       
                            
                    

<?php } }?>



</div>
        </div>


        <div class="col-md mb-5">
          <h2 class="mb-5">Education</h2>

          <?php 
         if(isset($_SESSION['USERROLE'])){
            $appeduc= $_SESSION['USERID'];
         $query = "SELECT * FROM `applicant_educationbg` left join users on users.user_id = applicant_educationbg.aebg_user_id  where applicant_educationbg.aebg_user_id = $appeduc";
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

<?php } }?>

        </div>     
        


      <div class="row">
        <div class="col-md mb-5">
          <h2 class="mb-5">Skills</h2>      
          
          <?php 
                                     if(isset($_SESSION['USERROLE'])){
                                        $appskl= $_SESSION['USERID'];
                                     $query = "SELECT * FROM `applicant_skills` left join users on users.user_id = applicant_skills.as_user_id where applicant_skills.as_user_id=$appskl";
                                      $result = $crudapi->getData($query);
                                      $number = 1;
                                      foreach ($result as $key => $data) {
                                  ?>

<h2 style="color:black;"><?php echo strtoupper($data['as_skillname']); ?></h2>



<?php } }?>
     
      </div>
    </div>

    
        <div class="col-md mb-5">
          <h2 class="mb-5">Additional Information</h2>

          <?php 
         if(isset($_SESSION['USERROLE'])){
            $appinfo= $_SESSION['USERID'];
            $query = "SELECT * FROM `applicant_additional_info` left join users on users.user_id = applicant_additional_info.aai_user_id where applicant_additional_info.aai_user_id=$appinfo";
            $result = $crudapi->getData($query);
            $number = 1;
            foreach ($result as $key => $data) {
        ?>

            <ul>
            
                <li style="font-size:20px; font-weight:bold;"><i style="font-weight:lighter;" class="fa-solid fa-peso-sign">PHP</i><?php echo strtoupper($data['aai_expected_salary']); ?></li>
                <li style="font-size:20px; font-weight:bold;"><i class="fa fa-map-marker-alt"></i><?php echo strtoupper($data['aai_location']); ?></li>
                <li style="font-size:20px; font-weight:bold;"><i class="fas fa-briefcase"></i><?php echo strtoupper($data['aai_wfh_os']); ?></li>
                
            </ul>

<?php } }?>

        </div>     
        




      </div>
    </div>
    </div>
    </div>

    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>

<script>

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