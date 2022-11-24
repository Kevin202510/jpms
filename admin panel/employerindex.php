<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

    if(isset($_POST['addjobs'])) { 

    $job_company_name = $crudapi->escape_string($_POST['job_company_name']);    
    $jobs_name = $crudapi->escape_string($_POST['jobs_name']);
    $jobs_address = $crudapi->escape_string($_POST['jobs_address']);
    $jobs_description = $crudapi->escape_string($_POST['jobs_description']);
    $jobs_r_skills = $crudapi->escape_string($_POST['jobs_r_skills']);
    $jobs_r_education_id = $crudapi->escape_string($_POST['jobs_r_education_id']);
    $jobs_preferred_time = $crudapi->escape_string($_POST['jobs_preferred_time']);
    $jobs_r_experience = $crudapi->escape_string($_POST['jobs_r_experience']);
    $jobs_vacancy_count = $crudapi->escape_string($_POST['jobs_vacancy_count']);
    $job_expected_salary = $crudapi->escape_string($_POST['job_expected_salary']);
    $jobs_user_id = $crudapi->escape_string($_POST['jobs_user_id']);
      
    $result = $crudapi->execute("INSERT INTO jobs(job_company_name,jobs_name,jobs_address,jobs_description,jobs_preferred_time,jobs_r_skills,jobs_r_education_id,jobs_r_experience,jobs_vacancy_count,job_expected_salary,jobs_user_id)VALUES('j$ob_company_name','$jobs_name','$jobs_address','$jobs_description','$jobs_r_skills','$jobs_r_education_id','$jobs_preferred_time','$jobs_r_experience','$jobs_vacancy_count','$job_expected_salary','3')");
    
    echo '<script>alert("ADDED SUCCESS");</script>';
    // echo '<script>window.reload();</script>';
}
     if(isset($_POST['editexp'])) {  

    $jobs_id = $crudapi->escape_string($_POST['jobs_id']);
    $job_company_name = $crudapi->escape_string($_POST['job_company_name']);    
    $jobs_name = $crudapi->escape_string($_POST['jobs_name']);
    $jobs_address = $crudapi->escape_string($_POST['jobs_address']);
    $jobs_description = $crudapi->escape_string($_POST['jobs_description']);
    $jobs_r_skills = $crudapi->escape_string($_POST['jobs_r_skills']);
    $jobs_r_education_id = $crudapi->escape_string($_POST['jobs_r_education_id']);
    $jobs_preferred_time = $crudapi->escape_string($_POST['jobs_preferred_time']);
    $jobs_r_experience = $crudapi->escape_string($_POST['jobs_r_experience']);
    $jobs_vacancy_count = $crudapi->escape_string($_POST['jobs_vacancy_count']);
    $job_expected_salary = $crudapi->escape_string($_POST['job_expected_salary']);
    
      
    $result = $crudapi->execute("UPDATE jobs SET job_company_name='$job_company_name',jobs_name='$jobs_name',jobs_address='$jobs_address',jobs_description='$jobs_description',jobs_r_skills='$jobs_r_skills',jobs_r_education_id=
        '$jobs_r_education_id',jobs_preferred_time='$jobs_preferred_time',jobs_r_experience='$jobs_r_experience',jobs_vacancy_count='$jobs_vacancy_count',job_expected_salary='$job_expected_salary'
     WHERE jobs_id = '$jobs_id' ");
    
    echo '<script>alert("UPDATED SUCCESS");</script>';
    header("location:employerindex.php");
}
if(isset($_POST['deleteexp'])) {  

    $jobs_id = $crudapi->escape_string($_POST['jobs_id']);
      
    $result = $crudapi->execute("DELETE from jobs WHERE jobs_id = '$jobs_id' ");
    
    echo '<script>alert("DELETED SUCCESS");</script>';
    header("location:employerindex.php");
}       
?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebaremployeer.php'); ?>

<section class="section profile">

<div class="container-fluid">
  <div class="card" style="margin-bottom:30px;">
    <div class="card-header">
      <button type="button" class="btn btn-primary" id="jobs" style="float:right;">ADD</button>
    </div>


<div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Campany Name</th>
            <th scope="col">Address</th>
            <th scope="col">Description</th>
            <th scope="col">Skill</th>
            <th scope="col">Education</th>
            <th scope="col">Preferred Time</th>
            <th scope="col">Experience</th>
            <th scope="col">Vacancy</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $query = "SELECT * FROM `jobs` left join users on users.user_id = jobs.jobs_user_id where jobs.jobs_user_id=3";
            $result = $crudapi->getData($query);
            $number = 1;
            foreach ($result as $key => $data) {
        ?>
            <tr>
              <th scope="row"><?php echo $number; ?></th>
              <td><?php echo $data["job_company_name"] ?></td>
              <td><?php echo $data["jobs_name"] ?></td>
              <td><?php echo $data["jobs_address"] ?></td>
              <td><?php echo $data["jobs_description"] ?></td>
              <td><?php echo $data["jobs_r_skills"] ?></td>
              <td><?php echo $data["jobs_r_education_id"] ?></td>
              <td><?php echo $data["jobs_preferred_time"] ?></td>
              <td><?php echo $data["jobs_r_experience"] ?></td>
              <td><?php echo $data["jobs_vacancy_count"] ?></td>
              <td><?php echo $data["job_expected_salary"] ?></td>
              <td><?php echo $data["jobs_user_id"] ?></td>
              <td>





                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-primary" id="editbtn">EDIT</button>
                  <button type="button" data-id="<?php echo $data['jobs_id']; ?>" class="btn btn-danger" id="deletebtn">DELETE</button>
                </div>
              </td>
            </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
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
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_id">
                    <input type="hidden" class="form-control" name="jobs_user_id" id="jobs_user_id">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="job_company_name" id="job_company_name" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="jobs_name" id="jobs_name" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="jobs_address" id="jobs_address" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" name="jobs_description" id="jobs_description" placeholder="Description"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Skills</label>
                        <input type="text" class="form-control" name="jobs_r_skills" id="jobs_r_skills" placeholder="Skills"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Education</label>
                        <select name="jobs_r_education_id" id="jobs_r_education_id">
                          <?php 
           
                              $query = "SELECT * FROM `education_attainment`";
                              $result = $crudapi->getData($query);
                              $number = 1;
                              foreach ($result as $key => $data) {
                          ?>
                          <option value="<?php echo $data['ea_id']; ?>"><?php echo $data['ea_name']; ?></option>
                        <?php }?>
                        </select>
                        <!-- <input type="text" class="form-control" name="jobs_r_education_id" id="jobs_r_education_id" placeholder="Education"required> -->
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Time</label>
                        <select name="jobs_preferred_time" id="jobs_preferred_time">

                            <option value="1">Full Time</option>
                            <option value="0">Part Time</option>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Experience</label>
                        <input type="text" class="form-control" name="jobs_r_experience" id="jobs_r_experience" placeholder="Experience"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="number" class="form-control" name="jobs_vacancy_count" id="jobs_vacancy_count" placeholder="Vacancy"required>
                    </div> 
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" class="form-control" name="job_expected_salary" id="job_expected_salary" placeholder="Vacancy"required>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addjobs">ADD</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>


         <!-- UpdateMODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_ids">
                    <input type="hidden" class="form-control" name="jobs_user_id" id="jobs_user_ids">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Name</label>
                        <input type="text" class="form-control" name="job_company_name" id="job_company_name" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="jobs_name" id="jobs_names" placeholder="Comapany Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Comapany Address</label>
                        <input type="text" class="form-control" name="jobs_address" id="jobs_addresss" placeholder="Comapany Address"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" name="jobs_description" id="jobs_descriptions" placeholder="Description"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Skills</label>
                        <input type="text" class="form-control" name="jobs_r_skills" id="jobs_r_skillss" placeholder="Skills"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Education</label>
                        <select name="jobs_r_education_id" id="jobs_r_education_ids">
                          <?php 
           
                              $query = "SELECT * FROM `education_attainment`";
                              $result = $crudapi->getData($query);
                              $number = 1;
                              foreach ($result as $key => $data) {
                          ?>
                          <option value="<?php echo $data['ea_id']; ?>"><?php echo $data['ea_name']; ?></option>
                        <?php }?>
                        </select>


                        <div class="form-group">
                        <label for="exampleInputPassword1">Preferred Time</label>
                        <select name="jobs_preferred_time" id="jobs_preferred_time">

                            <option value="1">Full Time</option>
                            <option value="0">Part Time</option>

                         </select>
                        <!-- <input type="text" class="form-control" name="jobs_r_education_id" id="jobs_r_education_id" placeholder="Education"required> -->
                    </div>
                </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Experience</label>
                        <input type="text" class="form-control" name="jobs_r_experience" id="jobs_r_experiences" placeholder="Experience"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="number" class="form-control" name="jobs_vacancy_count" id="jobs_vacancy_counts" placeholder="Vacancy"required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" class="form-control" name="job_expected_salary" id="job_expected_salary" placeholder="Vacancy"required>
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
                    <input type="hidden" class="form-control" name="jobs_id" id="jobs_idss">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="deleteexp">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>


    
 
 




<?php include('layouts/footer.php'); ?>

<script>
  $(document).ready(function(){
    $("#jobs").click(function(){
        // $("#ae_user_id").val($("user_id").val());
        $("#exampleModal").modal("show");
    });
  })

  $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("update_jobs.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#jobs_ids").val(emp[0].jobs_id);
            $("#jobs_user_ids").val(emp[0].jobs_user_id);
            $("#job_company_names").val(emp[0].job_company_name);
            $("#jobs_names").val(emp[0].jobs_name);
            $("#jobs_addresss").val(emp[0].jobs_address);
            $("#jobs_descriptions").val(emp[0].jobs_description);
            $("#jobs_r_skillss").val(emp[0].jobs_r_skills);
            $("#jobs_r_education_ids").val(emp[0].jobs_r_education_id);
            $("#jobs_preferred_times").val(emp[0].jobs_preferred_time);
            $("#jobs_r_experiences").val(emp[0].jobs_r_experience);
            $("#jobs_vacancy_counts").val(emp[0].jobs_vacancy_count);
            $("#job_expected_salarys").val(emp[0].job_expected_salary);
            
        });



        $("#editModal").modal("show");

    });


    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        $("#jobs_idss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });
</script>