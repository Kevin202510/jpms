<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();
    $jobs_user_id;
    if(isset($_SESSION['USERROLE'])){
      $jobs_user_id =  $_SESSION['USERID'];
    }


    if(isset($_POST['deletejob'])) {  
      $job_app_id  = $crudapi->escape_string($_POST['job_app_id']);
        
      $result = $crudapi->execute("DELETE from job_applicants WHERE job_app_id = '$job_app_id' ");
      
      echo '<script>alert("DELETED SUCCESS");</script>';
      header("location:jobapplicant.php");
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
            <th scope="col">Email</th>
             <tr>
            </thead>
            <tbody>
                <?php 
                     
                     $query = "SELECT * FROM `job_applicants` LEFT JOIN users ON users.user_id = job_applicants.job_app_user_id LEFT JOIN jobs on jobs.jobs_id = job_applicants.job_app_job_id WHERE jobs.jobs_user_id = ".$_SESSION['USERID']."";
                     $result = $crudapi->getData($query);
                     $number = 1;
                     foreach ($result as $key => $data) {
                ?>
                 <tr>
                 <th scope="row"><?php echo $number; ?></th>
              
              <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
              <td><?php echo strtoupper($data["address"]) ?></td>
              <td><?php echo strtoupper($data["user_email"]) ?></td>
             
              
                     <td>
              
              
                       <div class="items-link items-link2 f-right">
                        <button type="button" data-id="<?php echo $data['user_id']; ?>" class="btn btn-primary" id="view">View</button>
                        <button type="button" data-id="<?php echo $data['user_id']; ?>" class="btn btn-primary" id="viewreq">Requarments </button>
                        <button type="button" data-id="<?php echo $data['job_app_id']; ?>" class="btn btn-primary" id="delete">unlike </button>
                        
                      </div>
                     
              </td>
              </tr>
          <?php $number++;  } ?>
        </tbody>
      </table>

      

<!-- ViewMODAL -->

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        
<div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View</h5>
 
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

   
        <div class="row">
          <div class="col-md-3 text-left text-md-center mb-3">
            <img class="rounded-circle img-fluid" src="https://i.pravatar.cc/175?img=32" alt="Profile Photo" />
          </div>
          <div class="col-md-9">
            <h1 id="fullnamez"></h1>
            
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
                
                  <a class="text-white ml-2" id="user_emailz"></a>
              
             
              
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>
                
                  <a class="text-white ml-2" id="addressz"></a>
                    
            
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg>
                  
                  <a class="text-white ml-2" id="user_contactz"></a>
              </div> 
              
            
          </div>
      </div>
    </nav>
   
      <div class="row">
        <div class="col-md mb-5">
          <h2 class="mb-5">Work Experience</h2>
          

                  

                   <h2 style="font-weight:bold;" id="ae_companynamez"></h2>

                              <ul>
                                  <li style="font-weight:bold;" id="ae_companyaddressz"><i  style="color:black;" class="fas fa-map-marker-alt"></i></li>
                                  <li style="font-weight:bold;" id="ae_positionz"><i  style="color:black;" class="fas fa-briefcase"></i></li>
                                  <li style="font-weight:bold;" id="ae_fromz"><i style="color:black;" class="fas fa-calendar"></i></li>
                                  <li style="font-weight:bold;" id="ae_toz"><i style="color:black;" class="fas fa-calendar"></i></li>
                              </ul>

                
             </div>
        </div>

                <div class="col-md mb-5">
                 <h2 class="mb-5">Education</h2>

                   
                   <h3 style="font-weight:bold;" id="aebg_school_namez"></h3>

                 <ul>
                    <li style="color:black;" id="aebg_year_graduatez"><i style="color:black;" class="fas fa-calendar"></i></li>
                    <li style="color:black;" id="aebg_education_attainment_idz"><i style="color:black;" class="fas fa-graduation-cap"></i></li>

                 </ul>



                </div>     
      


                           <div class="row">
                           <div class="col-md mb-5">
                            <h2 class="mb-5">Skills</h2>      
          
                            

                          <h2 style="color:black;" id="as_skillnamez"></h2>

                              

                        </div>
                           </div>


                           <div class="row">
                           <div class="col-md mb-5">
                            <h2 class="mb-5">Additional Information</h2>      
          
                        <ul>
                         <li style="color:black;" id="aai_expected_salaryz"><i style="color:black;" class="fas fa-calendar"></i></li>
                        <li style="color:black;" id="aai_locationz"><i style="color:black;" class="fas fa-graduation-cap"></i></li>
                        <li style="color:black;" id="aai_wfh_osz"><i style="color:black;" class="fas fa-graduation-cap"></i></li>

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
</div>

<!-- viewreq -->

<div class="modal fade" id="viewrequarments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">VIEW REQUARMENTS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
          </button>
        </div>
                    
        <div class="modal-body">
                           
            <div class="card">
              <div class="container" style="width:100px; height:100px; background-color:green;">
                  <a type="button" style="width:50px; height:50px; background-color:red;" href="sample.php?pdfname=KEVIN FELIX CALUAG.pdf">CV</a> 
              </div>
            </div>
            <img class="brand-image img-circle" id="preview" src="{{ asset('img/others/roa1.jpg') }}" width="200" height="150" />
                                <label class="form-control" for="book_image"><span class="fa fa-camera"></span>&nbsp;Select Image</label>
                                <input type="file" name="book_image" id="book_image" style="margin: 0 auto; visibility: hidden; display: none;">


        </div>
    </div>
  </div>
</div>

<!-- viewreq -->   


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
                    <input type="hidden" class="form-control" name="job_app_id" id="job_app_id">
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


<?php include('layouts/footer.php'); ?>


<script>

$(document).ready(function(){
  
  $("body").on('click','#view',function(e){

var USER_IDs = $(e.currentTarget).data('id');
// alert(USER_IDs);
$.post("updateapplicant.php",{USER_IDsss: USER_IDs},function(data,status){
    var emp = JSON.parse(data);
    console.log(emp);
    // $("#jobs_idss").val(emp[0].jobs_id);
    // $("#jobs_user_idss").val(emp[0].jobs_user_id);
    $("#fullnamez").text((emp[0].user_fname) +" "+ (emp[0].user_lname));
    $("#user_emailz").text(emp[0].user_email);
    $("#addressz").text(emp[0].address);
    $("#user_contactz").text(emp[0].user_contact);
    $("#ae_companynamez").text(emp[0].ae_companyname);
    $("#ae_companyaddressz").text(emp[0].ae_companyaddress);
    $("#ae_positionz").text(emp[0].ae_position);
    $("#ae_fromz").text(emp[0].ae_from);
    $("#ae_toz").text(emp[0].ae_to);
    $("#aebg_school_namez").text(emp[0].aebg_school_name);
    $("#aebg_year_graduatez").text(emp[0].aebg_year_graduate);
    $("#aebg_education_attainment_idz").text(emp[0].aebg_education_attainment_id);
    $("#as_skillnamez").text(emp[0].as_skillname);
    $("#aai_expected_salaryz").text(emp[0].aai_expected_salary);
    $("#aai_locationz").text(emp[0].aai_location);
    $("#aai_wfh_osz").text(emp[0].aai_wfh_os);
    
    
});

$("#viewModal").modal("show");
});

$("#viewreq").click(function(){
$("#viewrequarments").modal("show");
});

$("body").on('click','#delete',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#job_app_id").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

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
})
</script>