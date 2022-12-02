
<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 
if(isset($_POST['addexp'])) {	

    $ae_user_id = $crudapi->escape_string($_POST['ae_user_id']);
    $ae_companyname = $crudapi->escape_string($_POST['ae_companyname']);
    $ae_companyaddress = $crudapi->escape_string($_POST['ae_companyaddress']);
    $ae_position = $crudapi->escape_string($_POST['ae_position']);
    $ae_from = $crudapi->escape_string($_POST['ae_from']);
    $ae_to = $crudapi->escape_string($_POST['ae_to']);
      
    $result = $crudapi->execute("INSERT INTO applicant_experience(ae_user_id,ae_companyname,ae_companyaddress,ae_position,ae_from,ae_to) VALUES('1','$ae_companyname','$ae_companyaddress','$ae_position','$ae_from','$ae_to')");
    
    echo '<script>alert("ADDED SUCCESS");</script>';
    header("location:applicant_exp.php");
}
if(isset($_POST['editexp'])) {	

    $ae_id = $crudapi->escape_string($_POST['ae_id']);
    $ae_companyname = $crudapi->escape_string($_POST['ae_companyname']);
    $ae_companyaddress = $crudapi->escape_string($_POST['ae_companyaddress']);
    $ae_position = $crudapi->escape_string($_POST['ae_position']);
    $ae_from = $crudapi->escape_string($_POST['ae_from']);
    $ae_to = $crudapi->escape_string($_POST['ae_to']);
      
    $result = $crudapi->execute("UPDATE applicant_experience SET ae_companyname='$ae_companyname',ae_companyaddress='$ae_companyaddress',ae_position='$ae_position',ae_from='$ae_from',ae_to='$ae_to' WHERE ae_id = '$ae_id' ");
    
    echo '<script>alert("UPDATED SUCCESS");</script>';
    header("location:applicant_exp.php");
}
if(isset($_POST['deleteexp'])) {	

    $ae_id = $crudapi->escape_string($_POST['ae_id']);
      
    $result = $crudapi->execute("DELETE from applicant_experience WHERE ae_id = '$ae_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:applicant_exp.php");
}
?>

<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
    <main>
      
    <section class="section profile">
<div class="container-fluid" style="padding:30px;">
  <div class="card" style="margin-bottom:30px; padding:30px;">
    <div class="card-header" style="background-color:#1AA478;"> 
        <label Style="font-size:30px; color:white;">EXPERIENCE </label>
      <button type="button" class="btn btn-primary" id="addexps" style="float:right; background-color:#0A5F42;">ADD</button>
    </div>
    <div class="card-body" style="background-color:#c4eeef;">
        
            <div class="container-fluid">
                <div class="row">
                    <!-- Left content -->
                    
                    <!-- Right content -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                  
                                <?php 
         
                                   $query = "SELECT * FROM `applicant_experience` left join users on users.user_id = applicant_experience.ae_user_id where applicant_experience.ae_user_id=1";
                                      $result = $crudapi->getData($query);
                                       $number = 1;
                                    foreach ($result as $key => $data) {
                                  ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                       
                                        <div class="job-tittle job-tittle2">
                                            <a href="#">
                                                <h2 style="font-weight:bold;"><?php echo strtoupper($data['ae_companyname']); ?></h2>

                                            </a>
                                            <ul>
                                                <li style="font-weight:bold;"><i  style="color:black;" class="fas fa-map-marker-alt"></i><?php echo strtoupper($data['ae_companyaddress']); ?></li>
                                                <li style="font-weight:bold;"><i  style="color:black;" class="fas fa-briefcase"></i><?php echo strtoupper($data['ae_position']); ?></li>
                                              <li style="font-weight:bold;"><p><i style="color:black;" class="fas fa-calendar"></i>( <?php echo strtoupper($data["ae_from"]).") (".strtoupper($data["ae_to"]) ?> )</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <button type="button" data-id="<?php echo $data['ae_id']; ?>" class="btns" style="background-color:#669068; padding:20px; border:none;border-radius:20px;" id="editbtn"><i style="color:black" class="fa fa-pencil-alt"></i></button>
                                        <button type="button" data-id="<?php echo $data['ae_id']; ?>" class="btns" id="deletebtn"  style="background-color:#669068; padding:20px; border:none;border-radius:20px;"><i  style="color:red;" class="fa fa-trash-alt"></i></button>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                
                </div>
            </div>
        </div>




<!-- ADDMODAL -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="ae_id" id="ae_id">
                    <input type="hidden" class="form-control" name="ae_user_id" id="ae_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="ae_companyname" id="ae_companyname" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="ae_companyaddress" id="ae_companyaddress" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="ae_position" id="ae_position" placeholder="Position"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Form</label>
                        <input type="date" class="form-control" name="ae_from" id="ae_from" placeholder="Start Form"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">End To</label>
                        <input type="date" class="form-control" name="ae_to" id="ae_to" placeholder="End To"required>
                    </div>

                
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addexp">Save changes</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>
<!-- ADDMODAL -->

<!-- UpdateMODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="ae_id" id="ae_ids">
                    <input type="hidden" class="form-control" name="ae_user_id" id="ae_user_ids">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="ae_companyname" id="ae_companynames" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="ae_companyaddress" id="ae_companyaddresss" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="ae_position" id="ae_positions" placeholder="Position"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Form</label>
                        <input type="date" class="form-control" name="ae_from" id="ae_froms" placeholder="Start Form"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">End To</label>
                        <input type="date" class="form-control" name="ae_to" id="ae_tos" placeholder="End To"required>
                    </div>

                
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editexp">Update changes</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>

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
                    <input type="hidden" class="form-control" name="ae_id" id="ae_idss">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="deleteexp">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>


    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>

<script>
  $(document).ready(function(){
    $("#addexps").click(function(){
        $("#ae_user_id").val($("user_id").val());
        $("#exampleModal").modal("show");
    });
  })

    $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("updateapplicant_exp.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#ae_ids").val(emp[0].ae_id);
            $("#ae_user_ids").val(emp[0].ae_user_id);
            $("#ae_companynames").val(emp[0].ae_companyname);
            $("#ae_companyaddresss").val(emp[0].ae_companyaddress);
            $("#ae_positions").val(emp[0].ae_position);
            $("#ae_froms").val(emp[0].ae_from);
            $("#ae_tos").val(emp[0].ae_to);
        });

        $("#editModal").modal("show");

    });


    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#ae_idss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });

</script>