<?php session_start(); ?>
<?php 
  
  include_once("classes/CRUDAPI.php");
  $crudapi = new CRUDAPI();
 
  if(isset($_POST['deletes'])) {  

    $user_id = $crudapi->escape_string($_POST['user_id']);
      
    $result = $crudapi->execute("DELETE from users WHERE user_id = '$user_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:employerlist.php");
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

                 <h5><b>Employers List</b></h5>
                    <div class="search-bar" style="float:right;">
                        <div class="search-form d-flex align-items-center" method="POST" action="#">
                          <input type="text" id="searchData" placeholder="Search By Employer Name" style="width:200px;" title="Enter search keyword">
                         
                      </div>
                 </div>
      
        </div>
      </div>
    </div>

       <table class="table table-striped table-hover">
            <thead>
              <tr>
              <th scope="col">#</th>
            <th scope="col">Full NAme</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Email</th>

                   
             <tr>
            </thead>
            <tbody id="table-main">
                <?php                               
                      $query = "SELECT * FROM `users` LEFT JOIN requirements ON requirements.requirements_user_id = users.user_id LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 3";
                      $result = $crudapi->getData($query);
                      $number = 1;
                      foreach ($result as $key => $data) {
                ?>
           <tr>
           <th scope="row"><?php echo $number; ?></th>
           <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
           <td><?php echo strtoupper($data["address"]) ?></td>
              <td><?php echo strtoupper($data["user_contact"]) ?></td>
              <td><?php echo strtoupper($data["user_email"]) ?></td>
 
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">

              <button style="background-color:transparent;  border-radius:20px; background-color:#28a745;  border:none; color:#fff;" type="button" id="view_req_s" data-id="<?php echo $data['requirements_filename']; ?>">View Requirment</button>
                 
                  <button style="background-color:transparent; color:blue; border:none;" type="button" id="views" data-id="<?php echo $data['user_id']; ?>"><i class="bi bi-eye-fill"></i></button>
                  <button style="background-color:transparent; color:red; border:none;" type="button" id="Deleteemployer" data-id="<?php echo $data['user_id']; ?>" ><i class="bi bi-trash-fill"></i></button>

                </div>

              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
</div>



                                  
<!-- ViewMODAL -->

<div class="modal fade" id="viewsModal" tabindex="-1" role="dialog" aria-labelledby="viewsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:200px;" class="modal-title" id="viewsModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
             
                <div class="modal-body">
                 

                <div class="card" style="background-color:;">
                      
                    <div class="card-body" >
                    <div class="col-md-12 text-left text-md-center" >        
                    <center>  
                    <img id="profileimg_s" alt="Profile" class="rounded-circle" width="150" height="150">
          </div></center>
                     <div style="text-align:center;">       
                            <h2 id="full_name"></h2>
                           
                                    <hr>
                              
                                    <ul style="text-align:left;">                               
                                      <i class="bi bi-telephone" style="font-size:30px;  background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="user_contact"></label><br><br>
                                      <i class="bi bi-envelope circle-icon" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"></i><label style="font-size:20px;" id="user_email"></label><br><br>
                                      <i class="bi bi-geo-alt" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="address"></label>
                                    </ul>

                    </div>
                    </div>
                

        
                  </div>
              
                </div>
            </div>
         </div>
         </div>
<!-- View    -->


 <!-- delete -->
<div class="modal fade" id="DeleteusersModal" tabindex="-1" role="dialog" aria-labelledby="deletesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:150px;" class="modal-title" id="deletesModalLabel">Delete Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="user_id" id="user_idsszzz">

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:160px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="deletes">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>
                     
         <!-- ban delete -->

         <!-- viewreq -->

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
                  <a type="button" id="cv_sz" style="color:black; width:100px; height:50px;  margin-left:170px; text-align:center; background-color:#28a745; font-size:18px;">business Permet</a> 
              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<!-- viewreq -->  

  
   <!-- Accept MODAL -->

<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="views_ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5  style="margin-left:200px; color:black;" class="modal-title" id="views_ModalLabel">Accept</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
             
                <div class="modal-body">
                 

               
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:135px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="accept">Accept</button>
                    </div>
        
                  </div>
              
                </div>
            </div>
         </div>
         </div>
<!-- Accept  -->


 <!-- reject MODAL -->

 <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="view_ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:200px; color:black;" class="modal-title" id="view_ModalLabel">Reject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
             
                <div class="modal-body">
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:135px; background-color:#28a745;"  type="submit" class="btn btn-primary" name="reject">Rejected</button>
                    </div>
        
                  </div>
              
                </div>
            </div>
         </div>
         </div>
<!-- Accept  -->



<?php include('layouts/footer.php'); ?>



<script>

    $(document).ready(function(){
      $("body").on('click','#views',function(e){

var USER_ID = $(e.currentTarget).data('id');
//  alert(USER_ID);
$.post("updateusers.php",{USER_ID: USER_ID},function(data,status){
    var emp = JSON.parse(data);
     console.log(emp);
     $("#profileimg_s").attr("src","../profile/"+emp[0].user_profile_img);
    $("#full_name").text(emp[0].user_fname + " " + emp[0].user_lname);
    $("#address").text(emp[0].address);
    $("#user_contact").text(emp[0].user_contact);
    $("#user_email").text(emp[0].user_email);
    
});

$("#viewsModal").modal("show");

});


$("body").on('click','#accept',function(e){

var USER_ID = $(e.currentTarget).data('id');
//  alert(USER_ID);
$.post("updateusers.php",{USER_ID: USER_ID},function(data,status){
    var emp = JSON.parse(data);
     console.log(emp);
   
  
});

$("#acceptModal").modal("show");

});


$("body").on('click','#reject',function(e){

var USER_ID = $(e.currentTarget).data('id');
//  alert(USER_ID);
$.post("updateusers.php",{USER_ID: USER_ID},function(data,status){
    var emp = JSON.parse(data);
     console.log(emp);
   
  
});

$("#rejectModal").modal("show");

});


$("body").on('click','#Deleteemployer',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#user_idsszzz").val(USER_ID_DELETE);
        $("#DeleteusersModal").modal("show");

    });

    $("body").on('click','#view_req_s',function(e){
  // alert($(e.currentTarget).data('id'));
  var filename = $(e.currentTarget).data('id');
  $("#cv_sz").prop("href", "samples1.php?pdfname="+filename);
$("#view_requarments").modal("show");
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