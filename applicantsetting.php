
<?php if(isset($_POST['applicantSetting'])) {	

$user_id  = $crudapi->escape_string($_POST['user_id']);
$user_fname = $crudapi->escape_string($_POST['user_fname']);
$user_lname = $crudapi->escape_string($_POST['user_lname']);
$user_contact = $crudapi->escape_string($_POST['user_contact']);
$user_email = $crudapi->escape_string($_POST['user_email']);
$address = $crudapi->escape_string($_POST['address']);  
    
  $result = $crudapi->execute("UPDATE users SET user_fname='$user_fname',user_lname='$user_lname',user_contact='$user_contact',user_email='$user_email',address='$address' WHERE user_id = '$user_id' ");
  
  echo '<script>alert("UPDATED SUCCESS");</script>';
  header("location:applicantsetting.php");
}



?>

<!-- settings -->

<div class="modal fade" id="applicantSetting" tabindex="-1" role="dialog" aria-labelledby="applicantSettingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="applicantSettingLabel">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">

      

          <input type="hidden" class="form-control" name="user_id" id="user_idss">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_idssz">

                    <div class="form-group">
                                 <label for="exampleInputPassword1">First Name</label>
                                 <input type="text" class="form-control" name="user_fname" id="user_fnamessz" placeholder="First Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name</label>
                                 <input type="text" class="form-control" name="user_lname" id="user_lnamessz" placeholder="Last Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Contact</label>
                                 <input type="number" class="form-control" name="user_contact" id="user_contactssz" placeholder="Contact" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_emailssz" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Address</label>
                                 <input type="text" class="form-control" name="address" id="addressssz" placeholder="Address" required>
                             </div>
           

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="applicantSetting">Update</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>