</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   <!--  <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div> -->
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     <!--  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery-1.12.4.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<script>
  $(document).ready(function(){
    $("#outnako").click(function(){
      $("#logout").modal("show");
    });
  });


  $.post("updateusers.php",{USER_ID: $("#profilekoto").val()},function(data,status){
    // alert(USER_IDs);
    var emp = JSON.parse(data);
    if(emp[0].user_profile_img!=null){
      $("#profileimg").attr("src","../profile/"+emp[0].user_profile_img);
    }else{
      $("#profileimg").attr("src","../profile/default.png");
    }
  
});


$("body").on('click','#Verification',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
       // alert(USER_IDs);
        $.post("updateusers.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#user_id_z").val(emp[0].user_id);
            $("#user_email_z").val(emp[0].user_email);
        });

        $("#verification").modal("show");

    });





$("body").on('click','#settings',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
      //  alert(USER_IDs);
        $.post("updateusers.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#profileimgs").attr("src","../profile/"+emp[0].user_profile_img);
            $("#user_idss").val(emp[0].user_id);
            $("#user_role_idss").val(emp[0].user_role_id);
            $("#user_fnamess").val(emp[0].user_fname);
            $("#user_lnamess").val(emp[0].user_lname);
            $("#user_contactss").val(emp[0].user_contact);
            $("#user_emailss").val(emp[0].user_email);
            $("#addressss").val(emp[0].address);

          
        });

        $("#editusers").modal("show");

    });


    $("body").on('click','#profilebtn',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
       // alert(USER_IDs);
        $.post("updateusers.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#profileimgszz").attr("src","../profile/"+emp[0].user_profile_img);
            $("#user_idz").text(emp[0].user_id);
            $("#user_fnamez").text(emp[0].user_fname);
            $("#user_contactz").text(emp[0].user_contact);
            $("#user_emailz").text(emp[0].user_email);
            $("#addressz").text(emp[0].address);
    
        });

        $("#profilez").modal("show");

    });

   
  
  $(document).ready(function(){
    $("#registers").click(function(){
        // $("#as_user_id").val($("user_id").val());
        $("#exampleModal2").modal("hide");
        $("#exampleModal").modal("show");
    });
    $("#logins").click(function(){
        // $("#as_user_id").val($("user_id").val());
        $("#exampleModal2").modal("show");
    });
    $("#subreg").prop("disabled",true);
    $("#conuser_passwords").change(function(){
        if ($("#user_passwords").val()==$("#conuser_passwords").val()){
            $("#subreg").prop("disabled",false);
        }else{
            alert("PASSWORD DIDN'T MATCH");
        }
    });
  })
  

  
 
$(document).ready(function(){
      $("#uploadCV").click(function(e){
        var users_id = $(e.currentTarget).data('id');
        $("#user_id").val(users_id);
        $("#exampleModal").modal("show");
      });

      $("#upload_Profiles").click(function(e){
        var users_id = $(e.currentTarget).data('id');
        $("#user_ids").val(users_id);
        $("#uploadModals").modal("show");
      });
  });


</script>