<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 
if(isset($_POST['addinfo'])) {	

    $aai_expected_salary = $crudapi->escape_string($_POST['aai_expected_salary']);
    $aai_location = $crudapi->escape_string($_POST['aai_location']);
    $aai_wfh_os = $crudapi->escape_string($_POST['aai_wfh_os']);
   
 
      
    $result = $crudapi->execute("INSERT INTO applicant_additional_info(aai_expected_salary,aai_location,aai_wfh_os,aai_user_id) VALUES('$aai_expected_salary','$aai_location','$aai_wfh_os','1')");
    
    echo '<script>alert("ADDED SUCCESS");</script>';
    header("location:applicant_add_info.php");

    
}

if(isset($_POST['editinfo'])) {	
    
  $aai_id = $crudapi->escape_string($_POST['aai_id']);
  $aai_expected_salary = $crudapi->escape_string($_POST['aai_expected_salary']);
  $aai_location = $crudapi->escape_string($_POST['aai_location']);
  $aai_wfh_os = $crudapi->escape_string($_POST['aai_wfh_os']);
  
 
  $result = $crudapi->execute("UPDATE `applicant_additional_info` SET aai_expected_salary='$aai_expected_salary',aai_location='$aai_location',aai_wfh_os='$aai_wfh_os' WHERE aai_id='$aai_id' ");
 
  echo '<script>alert("UPDATED SUCCESS");</script>';
  header("location:applicant_add_info.php");
}


if(isset($_POST['deleteinfo'])) {	

  $aai_id = $crudapi->escape_string($_POST['aai_id']);
    
  $result = $crudapi->execute("DELETE from applicant_additional_info WHERE aai_id = '$aai_id' ");
  
  echo '<script>alert("DELETED SUCCESS");</script>';
  header("location:applicant_add_info.php");
}

?>
<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
    <main>
    <section class="section profile">
<div class="container-fluid">
  <div class="card" style="margin-bottom:30px;">
    <div class="card-header">
      <button type="button" class="btn btn-primary" id="addinfos" style="float:right;">ADD</button>
    </div>
    <div class="card-body">
        <div class="row">
    <?php 
           
           $query = "SELECT * FROM `applicant_additional_info` left join users on users.user_id = applicant_additional_info.aai_user_id where applicant_additional_info.aai_user_id=1";
           $result = $crudapi->getData($query);
           $number = 1;
           foreach ($result as $key => $data) {
       ?>
    <div class="card" style="width: 18rem; margin-right:10px;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $data["aai_expected_salary"] ?></h5>
            <p class="card-text"><?php echo $data["aai_expected_salary"] ?> <br><?php echo $data["aai_location"] ?> <br><?php echo $data["aai_wfh_os"] ?></p>
            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" data-id="<?php echo $data['aai_id']; ?>" class="btn btn-primary" id="editbtn"><i class="fa fa-pencil-alt"></i></button>
                  <button type="button" data-id="<?php echo $data['aai_id']; ?>" class="btn btn-danger" id="deletebtn"><i class="fa fa-trash-alt"></i></button>
            </div>
            <input type="hidden" value="<?php echo $data["aai_user_id"] ?>" id="user_id">
        </div>
    </div>
    <?php $number++; } ?>
    </div>
    </div>
  </div>
</div>
</section>


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
                    <input type="hidden" class="form-control" name="aai_id" id="aai_id">
                    <input type="hidden" class="form-control" name="aai_user_id" id="aai_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Expected Salary</label>
                        <input type="number" class="form-control" name="aai_expected_salary" id="aai_expected_salary" placeholder="Expected Salary" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Location</label>
                        <input type="text" class="form-control" name="aai_location" id="aai_location" placeholder="Preferred Location"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Work</label>
                        <input type="text" class="form-control" name="aai_wfh_os" id="aai_wfh_os" placeholder="Preferred Word"required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addinfo">Save changes</button>
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
                <input type="hidden" class="form-control" name="aai_id" id="aai_ids">
                    <input type="hidden" class="form-control" name="aai_user_id" id="aai_user_ids">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Expected Salary</label>
                        <input type="number" class="form-control" name="aai_expected_salary" id="aai_expected_salarys" placeholder="Expected Salary" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Location</label>
                        <input type="text" class="form-control" name="aai_location" id="aai_locations" placeholder="Preferred Location"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Work</label>
                        <input type="text" class="form-control" name="aai_wfh_os" id="aai_wfh_oss" placeholder="Preferred Word"required>
                    </div>

                
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editinfo">Update changes</button>
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
                    <input type="hidden" class="form-control" name="aai_id" id="aai_idss">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="deleteinfo">Delete</button>
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
    $("#addinfos").click(function(){
        $("#aai_user_id ").val($("user_id").val());
        $("#exampleModal").modal("show");
    });
  })


  $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("updateapplicant_add_info.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#aai_ids").val(emp[0].aai_id);
            $("#aai_user_ids").val(emp[0].aai_user_ids);
            $("#aai_expected_salarys").val(emp[0].aai_expected_salary);
            $("#aai_locations").val(emp[0].aai_location);
            $("#aai_wfh_oss").val(emp[0].aai_wfh_os);
          
        });

        $("#editModal").modal("show");

    });


    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#aai_idss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });

</script>