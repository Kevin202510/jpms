<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

    if(isset($_POST['userregister'])) {	

      $user_fname = $crudapi->escape_string($_POST['user_fname']);
      $user_lname = $crudapi->escape_string($_POST['user_lname']);
      $user_contact = $crudapi->escape_string($_POST['user_contact']);
      $user_email = $crudapi->escape_string($_POST['user_email']);
      $address = $crudapi->escape_string($_POST['address']);
      $user_password  = $crudapi->escape_string($_POST['user_password']);
      $conuser_password  = $crudapi->escape_string($_POST['conuser_password']);
      $user_role_id  = $crudapi->escape_string($_POST['user_role_id']);
  
      if($user_password != $conuser_password){   
          echo '<script>alert("password did not match");</script>';
          // echo "<script type='text/javascript'>
          //       $(document).ready(function(){
          //       $('#exampleModalLong').modal('show');
          //          });
          //        </script>";
  
      }
      else{
          echo '<script>alert("password match");</script>';
  
                  $hashed_password = md5($user_password);
  
      }
      $result = $crudapi->execute("INSERT INTO users(user_fname,user_lname,user_contact,user_email,address,user_password,user_role_id) VALUES('$user_fname','$user_lname','$user_contact','$user_email','$address','$hashed_password',$user_role_id)");
        echo '<script>alert("REGISTERED SUCCESS");</script>';
        header("location:userslist.php");  
      }   
  
      if(isset($_POST['editusers'])) {	

      $user_id  = $crudapi->escape_string($_POST['user_id']);
      $user_fname = $crudapi->escape_string($_POST['user_fname']);
      $user_lname = $crudapi->escape_string($_POST['user_lname']);
      $user_contact = $crudapi->escape_string($_POST['user_contact']);
      $user_email = $crudapi->escape_string($_POST['user_email']);
      $address = $crudapi->escape_string($_POST['address']);  
          
        $result = $crudapi->execute("UPDATE users SET user_fname='$user_fname',user_lname='$user_lname',user_contact='$user_contact',user_email='$user_email',address='$address' WHERE user_id = '$user_id' ");
        
        echo '<script>alert("UPDATED SUCCESS");</script>';
        header("location:userslist.php");
      }

      if(isset($_POST['deleteuser'])) {	

        $user_id = $crudapi->escape_string($_POST['user_id']);
          
        $result = $crudapi->execute("DELETE from users WHERE user_id = '$user_id'");
        
        echo '<script>alert("DELETED SUCCESS");</script>';
        header("location:userslist.php");
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

      

          <h5><b>Users Account</b></h5>
          <button type="button" class="btn btn-primary" id="userregisters" style=" background-color:#28a745;  width:100px; float:right; border:none;">ADD</button>
             <div class="search-bar">
                        <div class="search-form d-flex align-items-center" method="POST" action="#">
                          <input type="text" id="searchData" placeholder="Search By Employee Name" style="width:200px;" title="Enter search keyword">
                          
                      </div>
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
            <tbody id="table-main">
                <?php 
                      $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 2";
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
                   <div class="btn-group" role="group" aria-label="Basic example">
                       <button type="button" data-id="<?php echo $data['user_id']; ?>" id="editbtn" style="border: transparent; color: green; background: transparent;"><i class="bi bi-pencil-fill"></i></button>
                       <button type="button" data-id="<?php echo $data['user_id']; ?>" id="deletebtn" style="border: transparent; color: red; background: transparent;"> <i class="bi bi-trash-fill"></i></button>
                    </div>

              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
</div>
</div>


<!-- users MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                             <div class="modal-header"  style="background-color: #28a745;">
                              <h5 Style="margin-left:200px;" class="modal-title" id="exampleModalLabel">Users</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </button>
                           </div>
                    <div class="modal-body">
                        <form method="POST">

                        <input type="hidden" class="form-control" name="user_id" id="user_id">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_id">

                             <div class="form-group">
                                 <label for="exampleInputPassword1">First Name</label>
                                 <input type="text" class="form-control" name="user_fname" id="user_fname" placeholder="First Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name</label>
                                 <input type="text" class="form-control" name="user_lname" id="user_lname" placeholder="Last Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Contact</label>
                                 <input type="number" class="form-control" name="user_contact" id="user_contact" placeholder="Contact" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Address</label>
                                 <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Confirm Password</label>
                                 <input type="password" class="form-control" name="conuser_password" id="conuser_password" placeholder="Confirm Password" required>
                             </div>

                             <input type="hidden" class="form-control" name="user_role_id" id="user_role_id" value="2">
                       
                    
                     

                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                                     <button style="border-radius:20px; margin-right:120px; 10px; background-color:#28a745;" type="submit" class="btn btn-primary" name="userregister">REGISTERED</button>
                               </div>
                         </form>
                    </div>
                </div>
            </div>
         </div>
<!-- users MODAL -->


<!-- Update user MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header"  style="background-color:#28a745;">
                    <h5 style="margin-left:185px;"class="modal-title" id="exampleModalLabel" class="modal-title" id="editModalLabel">Edit Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="user_id" id="user_ids">
                    <input type="hidden" class="form-control" name="user_role_id" id="user_role_ids">

                    <div class="form-group">
                                 <label for="exampleInputPassword1">First Name</label>
                                 <input type="text" class="form-control" name="user_fname" id="user_fnames" placeholder="First Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name</label>
                                 <input type="text" class="form-control" name="user_lname" id="user_lnames" placeholder="Last Name" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Contact</label>
                                 <input type="number" class="form-control" name="user_contact" id="user_contacts" placeholder="Contact" required>
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email</label>
                                 <input type="text" class="form-control" name="user_email" id="user_emails" placeholder="Email" required>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Address</label>
                                 <input type="text" class="form-control" name="address" id="addresss" placeholder="Address" required>
                             </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:130px; 10px; background-color:#28a745;" type="submit" class="btn btn-primary" name="editusers">UPDATE</button>
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
                <div class="modal-header" style="background-color:#28a745;">
                    <h5 style="margin-left:180px;" class="modal-title" id="deleteModalLabel">Delete Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" name="user_id" id="user_idsss">
                    <div class="modal-footer"  >
                    <button type="button" class="btn btn-secondary" style="border-radius:20px; margin-right:10px; background-color:#28a745;" data-bs-dismiss="modal">Close</button>
                        <button style="border-radius:20px; margin-right:140px; background-color:#28a745;" type="submit" class="btn btn-primary" name="deleteuser">Delete</button>
                    </div>
                </form>
                </div>
               
                </div>
            </div>
         </div>


<?php include('layouts/footer.php'); ?>

<script>
  $(document).ready(function(){
    $("#userregisters").click(function(){
         $("#user_role_id").val($("user_id").val());
        $("#exampleModal").modal("show");
    });
  })

  $("body").on('click','#editbtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("updateusers.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#user_ids").val(emp[0].user_id);
            $("#user_role_ids").val(emp[0].user_role_id);
            $("#user_fnames").val(emp[0].user_fname);
            $("#user_lnames").val(emp[0].user_lname);
            $("#user_contacts").val(emp[0].user_contact);
            $("#user_emails").val(emp[0].user_email);
            $("#addresss").val(emp[0].address);
   
        });

        $("#editModal").modal("show");

    });

    $("body").on('click','#deletebtn',function(e){
        
        var USER_ID_DELETE = $(e.currentTarget).data('id');
        // alert(USER_ID_DELETE);
        $("#user_idsss").val(USER_ID_DELETE);
        $("#deleteModal").modal("show");

    });

    $("#searchData").keyup(function(){
        // alert("asd");
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchData");
    filter = input.value.toUpperCase();
    table = document.getElementById("table-main");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    });



  </script>