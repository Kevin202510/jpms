<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 
if(isset($_POST['addeduc'])) {	

    $aebg_user_id = $crudapi->escape_string($_POST['aebg_user_id']);
    $aebg_school_name = $crudapi->escape_string($_POST['aebg_school_name']);
    $aebg_year_graduate = $crudapi->escape_string($_POST['aebg_year_graduate']);
    $aebg_education_attainment_id = $crudapi->escape_string($_POST['aebg_year_graduate']);
 
      
    $result = $crudapi->execute("INSERT INTO applicant_educationbg(aebg_user_id,aebg_school_name,aebg_year_graduate,aebg_education_attainment_id) VALUES('1','$aebg_school_name','$aebg_year_graduate','$aebg_education_attainment_id')");
    
    echo '<script>alert("ADDED SUCCESS");</script>';
    // echo '<script>window.reload();</script>';
}

if(isset($_POST['editeduc'])) {	
    
  $aebg_id = $crudapi->escape_string($_POST['aebg_id']);
  $aebg_school_name = $crudapi->escape_string($_POST['aebg_school_name']);
  $aebg_year_graduate = $crudapi->escape_string($_POST['aebg_year_graduate']);
  $aebg_education_attainment_id = $crudapi->escape_string($_POST['aebg_education_attainment_id']);
  
 
  $result = $crudapi->execute("UPDATE `applicant_educationbg` SET aebg_school_name='$aebg_school_name',aebg_year_graduate='$aebg_year_graduate',aebg_education_attainment_id='$aebg_education_attainment_id' WHERE aebg_id='$aebg_id' ");
 
  echo '<script>alert("UPDATED SUCCESS");</script>';
  header("location:applicant_educ.php");
}


if(isset($_POST['deleteeduc'])) {	

  $aebg_id = $crudapi->escape_string($_POST['aebg_id']);
    
  $result = $crudapi->execute("DELETE from applicant_educationbg WHERE aebg_id = '$aebg_id' ");
  
  echo '<script>alert("DELETED SUCCESS");</script>';
  header("location:applicant_educ.php");
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
      <button type="button" class="btn btn-primary" id="addeducs" style="float:right;">ADD</button>
    </div>
    <div class="card-body">
    <div class="row">
    <?php 
           
           $query = "SELECT * FROM `applicant_educationbg` left join users on users.user_id = applicant_educationbg.aebg_user_id  where applicant_educationbg.aebg_user_id =1";
           $result = $crudapi->getData($query);
           $number = 1;
           foreach ($result as $key => $data) {
       ?>
    <div class="card" style="width: 18rem; margin-right:10px;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $data["aebg_user_id"] ?></h5>
            <p class="card-text"><?php echo $data["aebg_school_name"] ?> <br><?php echo $data["aebg_year_graduate"] ?> <br><?php echo $data["aebg_education_attainment_id"] ?></p>
            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" data-id="<?php echo $data['aebg_id']; ?>" class="btn btn-primary" id="editbtn"><i class="fa fa-pencil-alt"></i></button>
                  <button type="button" data-id="<?php echo $data['aebg_id']; ?>" class="btn btn-danger" id="deletebtn"><i class="fa fa-trash-alt"></i></button>
            </div>
            <input type="hidden" value="<?php echo $data["aebg_user_id"] ?>" id="user_id">
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
                    <input type="hidden" class="form-control" name="aebg_id " id="aebg_id ">
                    <input type="hidden" class="form-control" name="aebg_user_id" id="aebg_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">School Name</label>
                        <input type="text" class="form-control" name="aebg_school_name" id="aebg_school_name" placeholder="School Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Year of Graduate</label>
                        <input type="text" class="form-control" name="aebg_year_graduate" id="aebg_year_graduate" placeholder="Year of Graduate"required>
                    </div>

                    <div class="form-group">
                        <select name="aebg_education_attainment_id" id="aebg_education_attainment_ids">
                        <?php $query = "SELECT * FROM `education_attainment`";
                            $result = $crudapi->getData($query);
                            $number = 1;
                            foreach ($result as $key => $data) { ?>
                        <option value="<?php echo $data['ea_id'] ?>"><?php echo $data['ea_name'] ?></option>
                        <?php }?>
                        </select>
                    </div>

                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addeduc">Save changes</button>
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
                <input type="hidden" class="form-control" name="aebg_id" id="aebg_ids">
                    <input type="hidden" class="form-control" name="aebg_user_id" id="aebg_user_ids">

                    <div class="form-group">
                        <label for="exampleInputPassword1">School Name</label>
                        <input type="text" class="form-control" name="aebg_school_name" id="aebg_school_names" placeholder="School Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Year of Graduate</label>
                        <input type="text" class="form-control" name="aebg_year_graduate" id="aebg_year_graduates" placeholder="Year of Graduate"required>
                    </div>

                    <div class="form-group">
                        <select name="aebg_education_attainment_id" id="aebg_education_attainment_ids">
                        <?php $query = "SELECT * FROM `education_attainment`";
                            $result = $crudapi->getData($query);
                            $number = 1;
                            foreach ($result as $key => $data) { ?>
                        <option value="<?php echo $data['ea_id'] ?>"><?php echo $data['ea_name'] ?></option>
                        <?php }?>
                        </select>
                    </div>

                
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editeduc">Update</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>
         <!--end update -->

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
                    <input type="hidden" class="form-control" name="aebg_id" id="aebg_idss">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="deleteeduc">Delete</button>
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
    $("#addeducs").click(function(){
        $("#aebg_user_id ").val($("user_id").val());
        $("#exampleModal").modal("show");
    });
  })

  

  $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("updateapplicant_educ.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#aebg_ids").val(emp[0].aebg_id);
            $("#aebg_user_id").val(emp[0].aebg_user_idebg_id);
            $("#aebg_school_names").val(emp[0].aebg_school_name);
            $("#aebg_year_graduates").val(emp[0].aebg_year_graduate);
            $("#aebg_education_attainment_ids").val(emp[0].aebg_education_attainment_id);
           
        });

        $("#editModal").modal("show");

    });


    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#aebg_idss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });

</script>