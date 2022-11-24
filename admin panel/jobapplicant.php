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
<?php include('layouts/sidebaremployeer.php'); ?>

<section class="section profile">
<div class="container-fluid">
  <div class="card">
    
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">ROLENAME</th>
            <th scope="col">FULLNAME</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">CONTACT</th>
            <th scope="col">USERNAME</th>
            <th scope="col">ACTION</th>
          </tr>
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
              <td><?php echo $data["display_name"] ?></td>
              <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
              <td><?php echo strtoupper($data["user_contact"]) ?></td>
              <td><?php echo $data["user_email"] ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" >VIEW</button>
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

<?php include('layouts/footer.php'); ?>