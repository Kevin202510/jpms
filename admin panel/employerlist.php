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
                        <div class="search-form d-flex align-items-center" method="POST" action="#">
                          <input type="text" id="searchData" placeholder="Search By Company Name" title="Enter search keyword">
                          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                      </div>
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
            <tbody id="table-main">
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
                            
                    <center>  <div class="col-md-12 text-left text-md-center ">
            <img class="rounded-circle img-fluid" src="https://i.pravatar.cc/175?img=32" alt="Profile Photo" />
          </div></center>
                     <div style="text-align:center;">       
                            <h2 id="full_name"></h2>
                           
                                    <hr>
                              
                                    <ul style="text-align:left;">                               
                                      <i class="bi bi-telephone" style="font-size:30px;  background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="user_contact"></label><br><br>
                                      <i class="bi bi-envelope circle-icon" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"></i><label style="font-size:20px;" id="user_email"></label><br><br>
                                      <i class="bi bi-geo-alt" style="font-size:30px; background:#ffc0c0; width:100px; heigth:100px; border-radius:50%; text-align:center; line-heigth:100px; vertical-align:middle; padding:10px;"> </i><label style="font-size:20px;" id="address"></label>
                                    </ul>

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

})

  
</script>