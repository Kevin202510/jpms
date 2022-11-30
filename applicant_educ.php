<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 
if(isset($_POST['addeduc'])) {	

    $aebg_user_id = $crudapi->escape_string($_POST['aebg_user_id']);
    $aebg_school_name = $crudapi->escape_string($_POST['aebg_school_name']);
    $aebg_year_graduate = $crudapi->escape_string($_POST['aebg_year_graduate']);
    $aebg_education_attainment_id = $crudapi->escape_string($_POST['aebg_education_attainment_id']);
 
      
    $result = $crudapi->execute("INSERT INTO applicant_educationbg (aebg_user_id,aebg_school_name,aebg_year_graduate,aebg_education_attainment_id) VALUES('1','$aebg_school_name','$aebg_year_graduate','$aebg_education_attainment_id')");
    
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
<div class="container-fluid" style="padding:30px;">
  <div class="card" style="margin-bottom:30px; padding:30px;">
    <div class="card-header"  style="background-color:#1AA478;"> 
        <label Style="font-size:30px;">EDUCATION</label>
      <button type="button" class="btn btn-primary" id="addeducs" style="float:right;  background-color:#0A5F42;">ADD</button>
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
         
                                    $query = "SELECT * FROM `applicant_educationbg` left join users on users.user_id = applicant_educationbg.aebg_user_id  where applicant_educationbg.aebg_user_id =1";
                                          $result = $crudapi->getData($query);
                                          $number = 1;
                                         foreach ($result as $key => $data) {
                                  ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">


                                       
                                        <div class="job-tittle job-tittle2">
                                            <a href="#">
                                                <h3 style="font-weight:bold;"><?php echo strtoupper($data['aebg_school_name']); ?></h3>

                                            </a>
                                            <ul>
                                                <li style="color:black;"><i style="color:black;" class="fas fa-calendar"></i><?php echo strtoupper($data['aebg_year_graduate']); ?></li>
                                                <li style="color:black;"><i style="color:black;" class="fas fa-graduation-cap"></i><?php echo strtoupper($data['aebg_education_attainment_id']); ?></li>
                                    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <button type="button" data-id="<?php echo $data['aebg_id']; ?>" class="btns" style="background-color:#669068;border:none; padding:20px; border-radius:20px;" id="editbtn"><i style="color:black" class="fa fa-pencil-alt"></i></button>
                                        <button type="button" data-id="<?php echo $data['aebg_id']; ?>" class="btns" id="deletebtn"  style="background-color:#669068; padding:20px; border:none;border-radius:20px;"><i  style="color:red;" class="fa fa-trash-alt"></i></button>
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
                    <input type="hidden" class="form-control" name="aebg_id" id="aebg_id">
                    <input type="hidden" class="form-control" name="aebg_user_id" id="aebg_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">School Name</label>
                        <input type="text" class="form-control" name="aebg_school_name" id="aebg_school_name" placeholder="School Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Year of Graduate</label>
                        <input type="date" class="form-control" name="aebg_year_graduate" id="aebg_year_graduate" placeholder="Year of Graduate"required>
                    </div>

                    <div class="form-group">
                        <select name="aebg_education_attainment_id" id="aebg_education_attainment_id">
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
                        <button type="submit" class="btn btn-primary" name="addeduc">Save</button>
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
                        <input type="date" class="form-control" name="aebg_year_graduate" id="aebg_year_graduates" placeholder="Year of Graduate"required>
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
            $("#aebg_user_ids").val(emp[0].aebg_user_idebg_id);
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