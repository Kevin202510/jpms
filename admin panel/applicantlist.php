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
            <div class="col-md-12">
            <?php if(isset($_SESSION['USERROLE'])){?>
                    <h1><?php echo  $_SESSION['FULLNAME'];?></h1>
                    <?php }?>
          <h5><b>Applicants List</b></h5>
          <div class="search-bar" style="float:right;">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
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
            <tbody>
                <?php 
              $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 4";
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
                          <a href="#"><i style="font-size:15px;" class="bi bi-eye-fill"></i></a>
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