<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 
if(isset($_POST['addskills'])) {	

    $as_user_id = $crudapi->escape_string($_POST['as_user_id']);
    $as_skillname = $crudapi->escape_string($_POST['as_skillname']);
   
      
    $result = $crudapi->execute("INSERT INTO applicant_skills(as_user_id,as_skillname) VALUES('1','$as_skillname')");
    
    echo '<script>alert("ADDED SUCCESS");</script>';
    header("location:applicant_skills.php");
}
if(isset($_POST['editskills'])) {	

    $as_id = $crudapi->escape_string($_POST['as_id']);
    $as_skillname = $crudapi->escape_string($_POST['as_skillname']);
   
      
    $result = $crudapi->execute("UPDATE applicant_skills SET as_skillname='$as_skillname' WHERE as_id = '$as_id' ");
    
    echo '<script>alert("UPDATED SUCCESS");</script>';
    header("location:applicant_skills.php");
}
if(isset($_POST['deleteskills'])) {	

    $as_id = $crudapi->escape_string($_POST['as_id']);
      
    $result = $crudapi->execute("DELETE from applicant_skills WHERE as_id = '$as_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:applicant_skills.php");
}
?>

<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
    <main>
        <!-- Our Services Start -->


        <section class="section profile">
<div class="container-fluid" style="padding:30px;">
  <div class="card" style="margin-bottom:30px; padding:30px;">
    <div class="card-header">
      <button type="button" class="btn btn-primary" id="addskills" style="float:right;">ADD</button>
    </div>
    <div class="card-body">
        <div class="row">
    <?php 
           
           $query = "SELECT * FROM `applicant_skills` left join users on users.user_id = applicant_skills.as_user_id where applicant_skills.as_user_id=1";
           $result = $crudapi->getData($query);
           $number = 1;
           foreach ($result as $key => $data) {
       ?>
    <div class="card" style="width: 18rem; margin-right:10px;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $data["as_skillname"] ?></h5>
            <p class="card-text"><?php echo $data["as_skillname"] ?></p>
            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" data-id="<?php echo $data['as_id']; ?>" class="btn btn-primary" id="editbtn"><i class="fa fa-pencil-alt"></i></button>
                  <button type="button" data-id="<?php echo $data['as_id']; ?>" class="btn btn-danger" id="deletebtn"><i class="fa fa-trash-alt"></i></button>
            </div>
            <input type="hidden" value="<?php echo $data["as_user_id"] ?>" id="user_id">
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
                    <input type="hidden" class="form-control" name="as_id" id="as_id">
                    <input type="hidden" class="form-control" name="as_user_id" id="as_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Skills</label>
                        <input type="text" class="form-control" name="as_skillname" id="as_skillname" placeholder="Skills" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addskills">Save changes</button>
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
                <input type="hidden" class="form-control" name="as_id" id="as_ids">
                    <input type="hidden" class="form-control" name="as_user_id" id="as_user_ids">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Skills</label>
                        <input type="text" class="form-control" name="as_skillname" id="as_skillnames" placeholder="Skills" required>
                    </div>

                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editskills">Update changes</button>
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
                    <input type="hidden" class="form-control" name="as_id" id="as_idss">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="deleteskills">Delete</button>
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
    $("#addskills").click(function(){
        $("#as_user_id").val($("user_id").val());
        $("#exampleModal").modal("show");
    });
  })

    $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("updateapplicant_skills.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#as_ids").val(emp[0].as_id);
            $("#as_user_ids").val(emp[0].as_user_id);
            $("#as_skillnames").val(emp[0].as_skillname);
          
        });

        $("#editModal").modal("show");

    });


    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#as_idss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });

</script>