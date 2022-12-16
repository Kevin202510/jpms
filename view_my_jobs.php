<?php session_start(); ?>
<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI();


?>
<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
    <main>
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
            
          <h5><b  style="color:white;">My Jobs List</b></h5>
          <div class="search-bar" style="float:right;">
                   <div class="search-form d-flex align-items-center" method="POST" action="#">
                      <input type="text" id="searchData" placeholder="Search By Company Name" style="width:200px;" title="Enter search keyword">
                      
                  </div>
      </div>
           
        </div>
      </div>
    </div>

       <table class="table table-striped table-hover">
            <thead>
              <tr>
                   <th scope="col">#</th>
                   <th scope="col">Company Name</th>
                   <th scope="col">job apply</th>
                   <th scope="col">apply date</th>
                   <th scope="col">Status</th>
             <tr>
            </thead>
            <tbody id="table-main">
                <?php 
                 if(isset($_SESSION['USERROLE'])){
                  $app_users= $_SESSION['USERID'];
              $query = "SELECT * FROM `job_applicants` LEFT JOIN jobs ON jobs.jobs_id = job_applicants.job_app_job_id LEFT JOIN users on users.user_id = job_applicants.job_app_user_id WHERE job_applicants.job_app_user_id = $app_users;";
              $result = $crudapi->getData($query);
              $number = 1;
              foreach ($result as $key => $data) {
                ?>
              <tr>
              <th scope="row"><?php echo $number; ?></th>
              <td><?php echo strtoupper($data["job_company_name"]) ?></td>
              <td><?php echo strtoupper($data["jobs_name"]) ?></td>
              <td><?php echo strtoupper($data["date_apply"]) ?></td>
              <td><?php 
                  
                  $statusVal = "Not Approved";

                  if($data['job_application_status']==1){
                      $statusVal = "Approved";
                  }

                  echo $statusVal;
              
              ?></td>
              </tr>
          <?php $number++;}} ?>
        </tbody>
      </table>
</div>
</div>


</main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>

<script>


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