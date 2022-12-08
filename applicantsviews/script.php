<!-- JS here -->
  
    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
      <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <script src="./assets/js/price_rangs.js"></script>
        
    <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
    <!-- Jquery Plugins, main Jquery -->  
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>

<script>



$(document).ready(function(){
    $("#outnako").click(function(){
      $("#logout").modal("show");
    });




     $("body").on('click','#profilebtn',function(e){
        // alert($(e.currentTarget).data('id'));
      var USER_IDs = $(e.currentTarget).data('id');
      $.post("admin panel/updateusers.php",{USER_ID: USER_IDs},function(data,status){
        alert("USER_IDs");
      var emp = JSON.parse(data);
      console.log(emp);
    $("#user_fnamezz").text(emp[0].user_fname + " " + emp[0].user_lname);
    $("#addresszz").text(emp[0].address);
    $("#user_contactzz").text(emp[0].user_contact);
    $("#user_emailzz").text(emp[0].user_email);
    
});

$("#profile").modal("show");

});


$("body").on('click','#settings',function(e){
        // alert($(e.currentTarget).data('id'));
        var USER_IDs = $(e.currentTarget).data('id');
        $.post("admin panel/updateusers.php",{USER_ID: USER_IDs},function(data,status){
            var emp = JSON.parse(data);
            $("#user_idssz").val(emp[0].user_id);
            $("#user_role_idssz").val(emp[0].user_role_id);
            $("#user_fnamessz").val(emp[0].user_fname);
            $("#user_lnamessz").val(emp[0].user_lname);
            $("#user_contactssz").val(emp[0].user_contact);
            $("#user_emailssz").val(emp[0].user_email);
            $("#addressssz").val(emp[0].address);

          
        });

        $("#applicantSetting").modal("show");

    });
 
});


</script>