<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

    if(isset($_POST['addNewEmployee'])) {	

      $FNAME = $crudapi->escape_string($_POST['FNAME']);
      $LNAME = $crudapi->escape_string($_POST['LNAME']);
      $ADDRESS = $crudapi->escape_string($_POST['ADDRESS']);
      $CONTACT = $crudapi->escape_string($_POST['CONTACT']);
      $USERNAME = $crudapi->escape_string($_POST['USERNAME']);
      $PASSWORD = $crudapi->escape_string($_POST['PASSWORD']);
      $ROLE_ID = $crudapi->escape_string($_POST['ROLE_ID']);
        
      $result = $crudapi->execute("INSERT INTO users(ROLE_ID,FNAME,LNAME,ADDRESS,CONTACT,USERNAME,PASSWORD) VALUES('$ROLE_ID','$FNAME','$LNAME','$ADDRESS','$CONTACT','$USERNAME','$PASSWORD')");

      echo '<script>alert("ADDED SUCCESS");</script>';
      header("location: usermanagement.php");
      
    }else if(isset($_POST['editEmployee'])) {	

      $FNAME = $crudapi->escape_string($_POST['FNAME']);
      $LNAME = $crudapi->escape_string($_POST['LNAME']);
      $ADDRESS = $crudapi->escape_string($_POST['ADDRESS']);
      $CONTACT = $crudapi->escape_string($_POST['CONTACT']);
      $USERNAME = $crudapi->escape_string($_POST['USERNAME']);
      $PASSWORD = $crudapi->escape_string($_POST['PASSWORD']);
      $ROLE_ID = $crudapi->escape_string($_POST['ROLE_ID']);
      $USER_ID = $crudapi->escape_string($_POST['USER_ID']);
        
      $result = $crudapi->execute("UPDATE users SET ROLE_ID='$ROLE_ID',FNAME='$FNAME',LNAME='$LNAME',ADDRESS='$ADDRESS',CONTACT='$CONTACT',USERNAME='$USERNAME',PASSWORD='$PASSWORD' WHERE USER_ID = '$USER_ID' ");

      echo '<script>alert("UPDATED SUCCESS");</script>';
      header("location: usermanagement.php");
    }else if(isset($_POST['deleteEmployee'])){
      $result = $crudapi->delete('USER_ID',$_POST['USER_ID'], 'users');
      echo '<script>alert("DELETED SUCCESS");</script>';
      header("location: usermanagement.php");
    }
    
    if(isset($_POST['Ban'])) {	

      $user_id = $crudapi->escape_string($_POST['user_id']);
        
      $result = $crudapi->execute("DELETE from users WHERE user_id = '$user_id' ");
      
      echo '<script>alert("DELETED SUCCESS");</script>';
      header("location:applicantlist.php");
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
            
          <h5><b>Applicants List</b></h5>
          <div class="search-bar" style="float:right;">
                   <div class="search-form d-flex align-items-center" method="POST" action="#">
                      <input type="text" id="searchData" placeholder="Search By Applicant Name" style="width:200px;" title="Enter search keyword">
                      
                  </div>
      </div>
           
        </div>
      </div>
    </div>

       <table class="table table-striped table-hover">
            <thead>
              <tr>
                   <th scope="col">#</th>
                   <th scope="col">Full Name</th>
                   <th scope="col">Contact Number</th>
                   <th scope="col">Email</th>
                   <th scope="col">Action</th>
             <tr>
            </thead>
            <tbody id="table-main">
                <?php 
              $query = "SELECT * FROM `users` LEFT JOIN requirements ON requirements.requirements_user_id = users.user_id where user_role_id = 4";
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
                          <!-- <a href="#"><i style="font-size:15px;" class="bi bi-eye-fill"></i></a> -->
                          <button type="button" data-id="<?php echo $data['requirements_filename']; ?>" class="btn btn-primary" id="viewreqs">Requirments</button>
                          <button type="button" data-id="<?php echo $data['user_id']; ?>" id="view" style="border: transparent; color: blue; background: transparent;"><i class="bi bi-eye-fill"></i></button>
                         <button type="button" data-id="<?php echo $data['user_id']; ?>" id="deleteuser" style="border: transparent; color: red; background: transparent;">Ban</button>
                      
                      
                      </div>
              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
</div>
</div>


<!-- ViewMODAL -->

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        
<div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:490px; color:black;" class="modal-title" id="viewModalLabel">View Resume</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button> 
                </div>
                <!-- <input type="button" value="Click Here" onclick="printDivContent()"> -->
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
          <img class="rounded-circle" src="../profile/<?php echo $data["user_profile_img"];?>" alt="Profile Photo" width="200" height="200" />
          </div>
          <div class="col-md-9">
            <h1 id="fullnamezz"></h1>
            
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
                
                  <a class="text-white ml-2" id="user_emailzz"></a>
              
             
              
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>
                
                  <a class="text-white ml-2" id="addresszz"></a>
                    
            
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg>
                  
                  <a class="text-white ml-2" id="user_contactzz"></a>
              </div> 
              
            
          </div>
      </div>
    </nav>
   
      <div class="row">
        <div class="col-md mb-5">
          <h2 class="mb-5">Work Experience</h2>
          

                  

                   <h2 style="color:black; font-size:17px;" id="ae_companynamezz"></h2>

                              <ul style="font-size:17px; ">
                                  <li style=" color:black;" id="ae_companyaddresszz"><i  style="color:black;" class="fas fa-map-marker-alt"></i></li>
                                  <li style=" color:black;" id="ae_positionzz"><i  style="color:black;" class="fas fa-briefcase"></i></li>
                                  <li style=" color:black;" id="ae_fromzz"><i style="color:black;" class="fas fa-calendar"></i></li>
                                  <li style="color:black;" id="ae_tozz"><i style="color:black;" class="fas fa-calendar"></i></li>
                              </ul>

                
             </div>
        </div>

                <div class="col-md mb-5">
                 <h2 class="mb-5">Education</h2>

                   
                   <h3 style="color:black; font-size:17px;" id="aebg_school_namezz"></h3>

                 <ul>
                    <li style="color:black; font-size:17px;" id="aebg_year_graduatezz"><i style="color:black;" class="fas fa-calendar"></i></li>
                    <li style="color:black; font-size:17px;"><span id="aebg_education_attainment_idzz"></span><i style="color:black;" class="fas fa-graduation-cap"></i></li>

                 </ul>



                </div>     
      


                           <div class="row">
                           <div class="col-md mb-5">
                            <h2 class="mb-5">Skills</h2>      
          
                            

                          <h2 style="color:black; font-size:17px;" id="as_skillnamezz"></h2>

                              

                        </div>
                           </div>


                           <div class="row">
                           <div class="col-md mb-5">
                            <h2 class="mb-5">Additional Information</h2>      
          
                        <ul  style="font-size:17px;">
                         <li style="color:black;" id="aai_expected_salaryzz"><i style="color:black;" class="fas fa-calendar"></i></li>
                        <li style="color:black;" id="aai_locationzz"><i style="color:black;" class="fas fa-graduation-cap"></i></li>
                        <li style="color:black;" id="aai_wfh_oszz"><i style="color:black;" class="fas fa-graduation-cap"></i></li>

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
      <div class="modal-header" style="background-color:#28a745;">
        <h5 style="margin-left:130px; color:black; " class="modal-title" id="exampleModalLabel">VIEW REQUIRMENTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
          </button>
        </div>
                    
        <div class="modal-body">

               
        <div >
              <div class="container">
                  <a type="button" id="cv_ss" style=" color:black; width:100px; height:50px; margin-left:170px; text-align:center; background-color:#28a745;">CV</a> 
              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<!-- viewreq -->                      

<!-- delete -->
<div class="modal fade" id="deleteuserModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:165px; color:black;" class="modal-title" id="deleteModalLabel">Ban Applicant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="user_id" id="user_idsszz">
                    <div class="modal-footer">
                         <button style="border-radius:20px; margin-right:10px; background-color:#28a745;" type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px;" data-bs-dismiss="modal">Close</button>
                        
                        <button style="border-radius:20px; margin-right:160px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="Ban">Ban</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>
         <!-- ban delete -->

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
    $("#fullnamezz").text((emp[0].user_fname) +" "+ (emp[0].user_lname));
    $("#user_emailzz").text(emp[0].user_email);
    $("#addresszz").text(emp[0].address);
    $("#user_contactzz").text(emp[0].user_contact);
    $("#ae_companynamezz").text(emp[0].ae_companyname);
    $("#ae_companyaddresszz").text(emp[0].ae_companyaddress);
    $("#ae_positionzz").text(emp[0].ae_position);
    $("#ae_fromzz").text(emp[0].ae_from);
    $("#ae_tozz").text(emp[0].ae_to);
    $("#aebg_school_namezz").text(emp[0].aebg_school_name);
    $("#aebg_year_graduatezz").text(emp[0].aebg_year_graduate);
    $("#aebg_education_attainment_idzz").text(emp[0].ae_companyaddress);
    $("#as_skillnamezz").text(emp[0].as_skillname);
    $("#aai_expected_salaryzz").text(emp[0].aai_expected_salary);
    $("#aai_locationzz").text(emp[0].aai_location);
    $("#aai_wfh_oszz").text(emp[0].aai_wfh_os);
    
    
});

$("#viewModal").modal("show");

});

$("body").on('click','#viewreqs',function(e){
  // alert($(e.currentTarget).data('id'));
  var filename = $(e.currentTarget).data('id');
  $("#cv_ss").prop("href", "samples1.php?pdfname="+filename);
  $("#viewrequarments").modal("show");
});

$("body").on('click','#deleteuser',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#user_idsszz").val(USER_ID_DELETE);
        $("#deleteuserModal").modal("show");

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