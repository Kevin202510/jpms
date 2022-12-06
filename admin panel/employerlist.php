<?php session_start(); ?>
<?php 
  
  include_once("classes/CRUDAPI.php");
  $crudapi = new CRUDAPI();

    
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

                 <h5><b>Employers List</b></h5>
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
            <th scope="col">Full NAme</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Email</th>

                   
             <tr>
            </thead>
            <tbody>
                <?php 
                      $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id = 3";
                      $result = $crudapi->getData($query);
                      $number = 1;
                      foreach ($result as $key => $data) {
                ?>
           <tr>
           <th scope="row"><?php echo $number; ?></th>
           <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
           <td><?php echo strtoupper($data["address"]) ?></td>
              <td><?php echo strtoupper($data["user_contact"]) ?></td>
              <td><?php echo strtoupper($data["user_email"]) ?></td>
 
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                 
                  <button type="button" id="views" data-id="<?php echo $data['user_id']; ?>" class="btn btn-primary" style="background-color:transparent; color:blue; border:none;" ><i class="bi bi-eye-fill"></i></button>
                </div>

              </td>
              </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
</div>




<!-- ViewMODAL -->

<div class="modal fade" id="viewsModal" tabindex="-1" role="dialog" aria-labelledby="viewsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewsModalLabel">View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             
                <div class="modal-body">
                 

                <div class="card" style="">
                      
                    <div class="card-body">
                            
                    <div class="form-group">
                        <img style="width:200px; " src="profiles/limboprofile.webp">
                        </div>

                        <div class=form-group >
                    Full Name <?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?> <br>
                    Address <?php echo strtoupper($data["address"]) ?><br>
                    Contact<?php echo strtoupper($data["user_contact"]) ?> <br>
                    Email<?php echo strtoupper($data["user_email"]) ?><br> 

                                         </div> 

                    </div>
                    </div>
                

        
                  </div>
              
                </div>
            </div>
         </div>
<!-- View    -->


<?php include('layouts/footer.php'); ?>



<script>

    $(document).ready(function(){
      $("body").on('click','#views',function(e){

var USER_ID = $(e.currentTarget).data('id');
//  alert(USER_ID);
$.post("updateusers.php",{USER_ID: USER_ID},function(data,status){
    var emp = JSON.parse(data);
     console.log(emp);
   
    $("#full_name").text(emp[0].user_fname + " " + emp[0].user_lname);
    $("#address").text(emp[0].address);
    $("#user_contact").text(emp[0].user_contact);
    $("#user_email").text(emp[0].user_email);
    
});

$("#viewsModal").modal("show");

});
})

  
</script>