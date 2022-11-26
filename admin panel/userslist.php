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
            <div class="col-sm-6">

          <h5><b>Users List</b></h5>
           
        </div>
      </div>
    </div>

       <table class="table table-striped table-hover">
            <thead>
              <tr>
                   <th scope="col">#</th>
                   <th scope="col">Campany Name</th>
                   <th scope="col">Position Name</th>
                   <th scope="col">Address</th>
                   <th scope="col">Description</th>
                   <th scope="col">Skill</th>
                   <th scope="col">Education</th>
                   <th scope="col">Preferred Time</th>
                   <th scope="col">Experience</th>
                   <th scope="col">Vacancy</th>
                   <th scope="col">Salary</th>
                   <th scope="col">Action</th>
                   
             <tr>
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
 
              <td>
                   <div class="btn-group" role="group" aria-label="Basic example">
                       <button type="button" data-id="<?php echo $data['jobs_id']; ?>" id="editbtn" style="border: transparent; color: green; background: transparent;"><i class="bi bi-pencil-fill"></i></button>
                       <button type="button" data-id="<?php echo $data['jobs_id']; ?>" id="deletebtn" style="border: transparent; color: red; background: transparent;"> <i class="bi bi-trash-fill"></i></button>
                    </div>

              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
</div>
</div>


<?php include('layouts/footer.php'); ?>